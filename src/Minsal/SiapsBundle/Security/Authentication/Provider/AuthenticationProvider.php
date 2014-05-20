<?php
// src/Minsal/SiapsBundle/Security/Authentication/Provider/AuthenticationProvider.php
namespace Minsal\SiapsBundle\Security\Authentication\Provider;

use Symfony\Component\Security\Core\Authentication\Provider\AuthenticationProviderInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\NonceExpiredException;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\AuthenticationServiceException;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Minsal\SiapsBundle\Security\ModuleProvider;

class AuthenticationProvider implements AuthenticationProviderInterface {
    private $userProvider;
    private $cacheDir;
    private $container;
    private $providerKey;
    private $hideUserNotFoundExceptions;
    private $userChecker;
    private $encoderFactory;

    protected $entityManager;

    /**
     * Constructor.
     *
     * @param UserCheckerInterface $userChecker                An UserCheckerInterface interface
     * @param string               $providerKey                A provider key
     * @param Boolean              $hideUserNotFoundExceptions Whether to hide user not found exception or not
     *
     * @throws InvalidArgumentException
     */
    public function __construct(UserProviderInterface $userProvider, $cacheDir, Container $container, $providerKey, UserCheckerInterface $userChecker, EncoderFactoryInterface $encoderFactory, $hideUserNotFoundExceptions = true)
    {
        $this->userProvider = $userProvider;
        $this->cacheDir     = $cacheDir;
        $this->container    = $container;
        $this->providerKey  = $providerKey;
        $this->hideUserNotFoundExceptions = $hideUserNotFoundExceptions;
        $this->userChecker  = $userChecker;
        $this->encoderFactory = $encoderFactory;
        $this->entityManager  = $this->container->get('doctrine.orm.entity_manager');
    }

    public function authenticate(TokenInterface $token) {
        $request = $this->container->get('request');

        if (!$this->supports($token)) {
            return null;
        }

        $username = $token->getUsername();
        if (empty($username)) {
            $username = 'NONE_PROVIDED';
        }
        
        try {
            $user = $this->retrieveUser($username, $token);
        } catch (UsernameNotFoundException $notFound) {
            if ($this->hideUserNotFoundExceptions) {
                throw new BadCredentialsException('Bad credentials', 0, $notFound);
            }
            $notFound->setUsername($username);

            throw $notFound;
        }
        
        if (!$user instanceof UserInterface) {
            throw new AuthenticationServiceException('retrieveUser() must return a UserInterface.');
        }

        try {
            $this->userChecker->checkPreAuth($user);
            
            if($request->get('_moduleSelection') != '3' && $request->get('_moduleSelection') != '4' && $request->get('_moduleSelection') != '6') {
                $this->checkAuthentication($user, $token);
            }
            $this->userChecker->checkPostAuth($user);
        } catch (BadCredentialsException $e) {
            if ($this->hideUserNotFoundExceptions) {
                throw new BadCredentialsException('Bad credentials', 0, $e);
            }

            throw $e;
        }

        $moduleProvider = new ModuleProvider($user, $request->get('_moduleSelection'), $this->container->get('database_connection'));
        if(!$moduleProvider->validateModule()) {
            throw new BadCredentialsException("No se poseen los privilegios necesarios para acceder a este m&oacute;dulo");
            
        }
        
        $authenticatedToken = new UsernamePasswordToken($user, $token->getCredentials(), $this->providerKey, $user->getRoles());
        $authenticatedToken->setAttributes($token->getAttributes());

        return $authenticatedToken;
    }

    /**
     * {@inheritdoc}
     */
    protected function checkAuthentication(UserInterface $user, UsernamePasswordToken $token)
    {
        $currentUser = $token->getUser();
        if ($currentUser instanceof UserInterface) {
            if ($currentUser->getPassword() !== $user->getPassword()) {
                throw new BadCredentialsException('The credentials were changed from another session.');
            }
        } else {
            if ("" === ($presentedPassword = $token->getCredentials())) {
                throw new BadCredentialsException('The presented password cannot be empty.');
            }

            if (!$this->encoderFactory->getEncoder($user)->isPasswordValid($user->getPassword(), $presentedPassword, $user->getSalt())) {
                throw new BadCredentialsException('The presented password is invalid.');
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function retrieveUser($username, UsernamePasswordToken $token)
    {
        $user = $token->getUser();
        if ($user instanceof UserInterface) {
            return $user;
        }

        try {
            $user = $this->userProvider->loadUserByUsername($username);
            
            if (!$user instanceof UserInterface) {
                throw new AuthenticationServiceException('The user provider must return a UserInterface object.');
            }
            
            return $user;
        } catch (UsernameNotFoundException $notFound) {
            $notFound->setUsername($username);
            throw $notFound;
        } catch (\Exception $repositoryProblem) {
            $ex = new AuthenticationServiceException($repositoryProblem->getMessage(), 0, $repositoryProblem);
            $ex->setToken($token);
            throw $ex;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function supports(TokenInterface $token)
    {
        return $token instanceof UsernamePasswordToken && $this->providerKey === $token->getProviderKey();
    }
}