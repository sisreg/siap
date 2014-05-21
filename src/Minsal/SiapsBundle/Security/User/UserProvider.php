<?php
// src/Minsal/SiapsBundle/Security/User/UserProvider.php
namespace Minsal\SiapsBundle\Security\User;

use FOS\UserBundle\Security\UserProvider as FOSProvider;
use Symfony\Component\DependencyInjection\ContainerInterface;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Http\Firewall\ExceptionListener;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationServiceException;

class UserProvider extends FOSProvider {
    private $entityManager;
    private $container;

    public function __construct(UserManagerInterface $userManager, ContainerInterface $container, EntityManager $entityManager) {
        parent::__construct($userManager);

        $this->container = $container;
        $this->entityManager = $entityManager;
    }

    public function loadUserByUsername($name) {

        $request = $this->container->get('request');

        if($request->get('_moduleSelection') != '3' && $request->get('_moduleSelection') != '4' && $request->get('_moduleSelection') != '6') {
            //Inicio de sesion por usuario y contraseña
            $user = $this->findUser($name);

            if (!$user) { 
                throw new UsernameNotFoundException(sprintf('Username "%s" does not exist.', $name));
            }
            
            return $user;
        } else {
            //inicio de sesion por firma digital
            $session = $this->container->get('session');
            $error = array();
            $files   = $request->files;
            $digitalSignature = $files->get('_digitalSignature');
            $uploadDir    = substr($this->container->get('kernel')->getRootDir(), 0, -4);

            if (null === $digitalSignature) {
                throw new BadCredentialsException('La firma digital no ha sido seleccionada');
            }

            if ($request->get('_password') == null) {
                throw new BadCredentialsException('La contraseña no ha sido ingresada');
            }

            if(!$digitalSignature->isValid()) {
                $error[] = "Error al cargar la firma digital<br />Error:<br />".$digitalSignature->getError();
            }

            if($digitalSignature->getClientMimeType() !== 'application/x-pkcs12') {
                $error[] = "El archivo seleccionado no es una llave de firma digital válida";
            }
            
            if(count($error) > 0) {
                $erroMessage = rimplode('<br />', $error);
                throw new BadCredentialsException($erroMessage);
            } else {
                try {
                    
                    $extension = $digitalSignature->guessExtension();
                    if (!$extension) {
                        $extension = 'bin';
                    }
                    
                    $passError = false;
                    $p12cert = array();
                    $fileName = rand(1, 99999);
                    $filePath = $uploadDir.'/upload/firmaDigital/'.$fileName.'.'.$extension;
                    $digitalSignature->move($uploadDir.'/upload/firmaDigital', $fileName.'.'.$extension);
                    $fileDSO = fopen($filePath, "r");
                    $fileDSBuffer = fread($fileDSO, filesize($filePath));
                    fclose($fileDSO);
                    unlink($filePath);
                    
                    if(openssl_pkcs12_read($fileDSBuffer, $p12cert, $request->get('_password'))) {
                        $pkey_data = print_r($p12cert['pkey'],true);
                        $cert_data = print_r($p12cert['cert'],true);
                    } else {
                        $passError = true;
                    }
                    
                    if($passError) {
                        throw new BadCredentialsException('La contraseña es incorrecta');
                    } else {
                        $cert = openssl_x509_read($cert_data);
                        $cert_data2 = openssl_x509_parse($cert);
                        $hash = $cert_data2["hash"];

                        $dql = "SELECT t01.id
                                FROM MinsalSiapsBundle:MntEmpleado t01
                                WHERE t01.firmaDigital = :firmaDigital";

                        $query = $this->entityManager->createQuery($dql);
                        $query->setParameter(':firmaDigital', $hash);
                        $idEmpleado = $query->getResult()[0]['id'];
                        
                        if($idEmpleado == null) {
                            throw new BadCredentialsException("No se ha encontrado ningun empleado con la firma digital proporcionada");
                        } else {
                            
                            $user = $this->entityManager->getRepository('MinsalSiapsBundle:User')->findOneBy(array('idEmpleado' => $idEmpleado, 'enabled' => true));
                            
                            if(!$user) {
                                throw new UsernameNotFoundException(sprintf('El empleado no posee usuario o no se encuentra activo.', $name));
                            } else {
                                return $user;
                            }
                        }
                    }
                } catch (\Exception $repositoryProblem) {
                    $ex = new AuthenticationServiceException('Error al procesar la firma digital<br /><br />Error:<br />'.$repositoryProblem->getMessage(), 0, $repositoryProblem);
                    throw $ex;
                    //throw new BadCredentialsException('La contraseña es incorrecta');
                }
            }
        }
    }
}
