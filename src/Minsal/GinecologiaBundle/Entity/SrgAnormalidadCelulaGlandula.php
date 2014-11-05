<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgAnormalidadCelulaGlandula
 *
 * @ORM\Table(name="srg_anormalidad_celula_glandula", indexes={@ORM\Index(name="IDX_DC073F90C2E87B78", columns={"id_examen_cervico_vaginal"})})
 * @ORM\Entity
 */
class SrgAnormalidadCelulaGlandula
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_anormalidad_celula_glandula_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="gladulares_atipicas_endocervica", type="boolean", nullable=true)
     */
    private $gladularesAtipicasEndocervica;

    /**
     * @var boolean
     *
     * @ORM\Column(name="gladulares_atipicas_endometrial", type="boolean", nullable=true)
     */
    private $gladularesAtipicasEndometrial;

    /**
     * @var boolean
     *
     * @ORM\Column(name="gladulares_atipicas_origen_no_d", type="boolean", nullable=true)
     */
    private $gladularesAtipicasOrigenNoD;

    /**
     * @var boolean
     *
     * @ORM\Column(name="endocervicales_favo_neoplasia", type="boolean", nullable=true)
     */
    private $endocervicalesFavoNeoplasia;

    /**
     * @var boolean
     *
     * @ORM\Column(name="grandulares_favo_neoplasia", type="boolean", nullable=true)
     */
    private $grandularesFavoNeoplasia;

    /**
     * @var boolean
     *
     * @ORM\Column(name="adenocarcinoma_endo_insitu", type="boolean", nullable=true)
     */
    private $adenocarcinomaEndoInsitu;

    /**
     * @var boolean
     *
     * @ORM\Column(name="adenocarcinoma_endocervical", type="boolean", nullable=true)
     */
    private $adenocarcinomaEndocervical;

    /**
     * @var boolean
     *
     * @ORM\Column(name="adenocarcinoma_extrauterino", type="boolean", nullable=true)
     */
    private $adenocarcinomaExtrauterino;

    /**
     * @var boolean
     *
     * @ORM\Column(name="adenocarcinoma_endometrial", type="boolean", nullable=true)
     */
    private $adenocarcinomaEndometrial;

    /**
     * @var boolean
     *
     * @ORM\Column(name="adenocarcinoma_sin_especificar", type="boolean", nullable=true)
     */
    private $adenocarcinomaSinEspecificar;

    /**
     * @var string
     *
     * @ORM\Column(name="detalle_otras_neopla_malignas", type="string", length=100, nullable=true)
     */
    private $detalleOtrasNeoplaMalignas;

    /**
     * @var \SrgExamenCervicoVaginal
     *
     * @ORM\OneToOne(targetEntity="SrgExamenCervicoVaginal", inversedBy="SrgAnormalidadCelulaGlandula")
     *   @ORM\JoinColumn(name="id_examen_cervico_vaginal", referencedColumnName="id")
     */
    private $idExamenCervicoVaginal;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set gladularesAtipicasEndocervica
     *
     * @param boolean $gladularesAtipicasEndocervica
     * @return SrgAnormalidadCelulaGlandula
     */
    public function setGladularesAtipicasEndocervica($gladularesAtipicasEndocervica)
    {
        $this->gladularesAtipicasEndocervica = $gladularesAtipicasEndocervica;

        return $this;
    }

    /**
     * Get gladularesAtipicasEndocervica
     *
     * @return boolean 
     */
    public function getGladularesAtipicasEndocervica()
    {
        return $this->gladularesAtipicasEndocervica;
    }

    /**
     * Set gladularesAtipicasEndometrial
     *
     * @param boolean $gladularesAtipicasEndometrial
     * @return SrgAnormalidadCelulaGlandula
     */
    public function setGladularesAtipicasEndometrial($gladularesAtipicasEndometrial)
    {
        $this->gladularesAtipicasEndometrial = $gladularesAtipicasEndometrial;

        return $this;
    }

    /**
     * Get gladularesAtipicasEndometrial
     *
     * @return boolean 
     */
    public function getGladularesAtipicasEndometrial()
    {
        return $this->gladularesAtipicasEndometrial;
    }

    /**
     * Set gladularesAtipicasOrigenNoD
     *
     * @param boolean $gladularesAtipicasOrigenNoD
     * @return SrgAnormalidadCelulaGlandula
     */
    public function setGladularesAtipicasOrigenNoD($gladularesAtipicasOrigenNoD)
    {
        $this->gladularesAtipicasOrigenNoD = $gladularesAtipicasOrigenNoD;

        return $this;
    }

    /**
     * Get gladularesAtipicasOrigenNoD
     *
     * @return boolean 
     */
    public function getGladularesAtipicasOrigenNoD()
    {
        return $this->gladularesAtipicasOrigenNoD;
    }

    /**
     * Set endocervicalesFavoNeoplasia
     *
     * @param boolean $endocervicalesFavoNeoplasia
     * @return SrgAnormalidadCelulaGlandula
     */
    public function setEndocervicalesFavoNeoplasia($endocervicalesFavoNeoplasia)
    {
        $this->endocervicalesFavoNeoplasia = $endocervicalesFavoNeoplasia;

        return $this;
    }

    /**
     * Get endocervicalesFavoNeoplasia
     *
     * @return boolean 
     */
    public function getEndocervicalesFavoNeoplasia()
    {
        return $this->endocervicalesFavoNeoplasia;
    }

    /**
     * Set grandularesFavoNeoplasia
     *
     * @param boolean $grandularesFavoNeoplasia
     * @return SrgAnormalidadCelulaGlandula
     */
    public function setGrandularesFavoNeoplasia($grandularesFavoNeoplasia)
    {
        $this->grandularesFavoNeoplasia = $grandularesFavoNeoplasia;

        return $this;
    }

    /**
     * Get grandularesFavoNeoplasia
     *
     * @return boolean 
     */
    public function getGrandularesFavoNeoplasia()
    {
        return $this->grandularesFavoNeoplasia;
    }

    /**
     * Set adenocarcinomaEndoInsitu
     *
     * @param boolean $adenocarcinomaEndoInsitu
     * @return SrgAnormalidadCelulaGlandula
     */
    public function setAdenocarcinomaEndoInsitu($adenocarcinomaEndoInsitu)
    {
        $this->adenocarcinomaEndoInsitu = $adenocarcinomaEndoInsitu;

        return $this;
    }

    /**
     * Get adenocarcinomaEndoInsitu
     *
     * @return boolean 
     */
    public function getAdenocarcinomaEndoInsitu()
    {
        return $this->adenocarcinomaEndoInsitu;
    }

    /**
     * Set adenocarcinomaEndocervical
     *
     * @param boolean $adenocarcinomaEndocervical
     * @return SrgAnormalidadCelulaGlandula
     */
    public function setAdenocarcinomaEndocervical($adenocarcinomaEndocervical)
    {
        $this->adenocarcinomaEndocervical = $adenocarcinomaEndocervical;

        return $this;
    }

    /**
     * Get adenocarcinomaEndocervical
     *
     * @return boolean 
     */
    public function getAdenocarcinomaEndocervical()
    {
        return $this->adenocarcinomaEndocervical;
    }

    /**
     * Set adenocarcinomaExtrauterino
     *
     * @param boolean $adenocarcinomaExtrauterino
     * @return SrgAnormalidadCelulaGlandula
     */
    public function setAdenocarcinomaExtrauterino($adenocarcinomaExtrauterino)
    {
        $this->adenocarcinomaExtrauterino = $adenocarcinomaExtrauterino;

        return $this;
    }

    /**
     * Get adenocarcinomaExtrauterino
     *
     * @return boolean 
     */
    public function getAdenocarcinomaExtrauterino()
    {
        return $this->adenocarcinomaExtrauterino;
    }

    /**
     * Set adenocarcinomaEndometrial
     *
     * @param boolean $adenocarcinomaEndometrial
     * @return SrgAnormalidadCelulaGlandula
     */
    public function setAdenocarcinomaEndometrial($adenocarcinomaEndometrial)
    {
        $this->adenocarcinomaEndometrial = $adenocarcinomaEndometrial;

        return $this;
    }

    /**
     * Get adenocarcinomaEndometrial
     *
     * @return boolean 
     */
    public function getAdenocarcinomaEndometrial()
    {
        return $this->adenocarcinomaEndometrial;
    }

    /**
     * Set adenocarcinomaSinEspecificar
     *
     * @param boolean $adenocarcinomaSinEspecificar
     * @return SrgAnormalidadCelulaGlandula
     */
    public function setAdenocarcinomaSinEspecificar($adenocarcinomaSinEspecificar)
    {
        $this->adenocarcinomaSinEspecificar = $adenocarcinomaSinEspecificar;

        return $this;
    }

    /**
     * Get adenocarcinomaSinEspecificar
     *
     * @return boolean 
     */
    public function getAdenocarcinomaSinEspecificar()
    {
        return $this->adenocarcinomaSinEspecificar;
    }

    /**
     * Set detalleOtrasNeoplaMalignas
     *
     * @param string $detalleOtrasNeoplaMalignas
     * @return SrgAnormalidadCelulaGlandula
     */
    public function setDetalleOtrasNeoplaMalignas($detalleOtrasNeoplaMalignas)
    {
        $this->detalleOtrasNeoplaMalignas = $detalleOtrasNeoplaMalignas;

        return $this;
    }

    /**
     * Get detalleOtrasNeoplaMalignas
     *
     * @return string 
     */
    public function getDetalleOtrasNeoplaMalignas()
    {
        return $this->detalleOtrasNeoplaMalignas;
    }

    /**
     * Set idExamenCervicoVaginal
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgExamenCervicoVaginal $idExamenCervicoVaginal
     * @return SrgAnormalidadCelulaGlandula
     */
    public function setIdExamenCervicoVaginal(\Minsal\GinecologiaBundle\Entity\SrgExamenCervicoVaginal $idExamenCervicoVaginal = null)
    {
        $this->idExamenCervicoVaginal = $idExamenCervicoVaginal;

        return $this;
    }

    /**
     * Get idExamenCervicoVaginal
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgExamenCervicoVaginal 
     */
    public function getIdExamenCervicoVaginal()
    {
        return $this->idExamenCervicoVaginal;
    }

       public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }
}
