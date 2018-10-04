<?php

namespace App\Transformers;

use App\BasisIgtifg;
use League\Fractal;
use League\Fractal\TransformerAbstract;

class BasisIgtifg1Transformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var  array
     */
    protected $availableIncludes = [];

    /**
     * List of resources to automatically include
     *
     * @var  array
     */
    protected $defaultIncludes = [];

    /**
     * Transform object into a generic array
     *
     * @var  object
     * @return array
     */
    public function transform(BasisIgtifg $basisigtifg)
    {
        return [
            'id'                => $basisigtifg->id,
            'basis_id'          => $basisigtifg->basis_id,
            'pid'               => $basisigtifg->pid,
            'log_date'          => $basisigtifg->log_date,
            'fall_ill_year'     => $basisigtifg->fall_ill_year,
            'fall_ill_month'    => $basisigtifg->fall_ill_month,
            'fall_ill_ii'       => json_decode($basisigtifg->fall_ill_ii),
            'comorbidity'       => json_decode($basisigtifg->comorbidity),
            'lung'              => $basisigtifg->lung,
            'liver'             => $basisigtifg->liver,
            'mental'            => $basisigtifg->mental,
            'cancer'            => $basisigtifg->cancer,
            'gestation'         => $basisigtifg->gestation,
            'stopgestation'     => $basisigtifg->stopgestation,
            'fami_medic_his'    => json_decode($basisigtifg->fami_medic_his),
            'relatives'         => json_decode($basisigtifg->relatives),
            'hypertension'      => json_decode($basisigtifg->hypertension),
            'cardiovascular'    => json_decode($basisigtifg->cardiovascular),
            'stroke'            => json_decode($basisigtifg->stroke),
            'activity'          => $basisigtifg->activity,
            'education'         => $basisigtifg->education,
            'occupation'        => $basisigtifg->occupation,
            'worktime'          => $basisigtifg->worktime,
            'fixedtime_from'    => json_decode($basisigtifg->fixedtime_from),
            'fixedtime_to'      => json_decode($basisigtifg->fixedtime_to),
            'dayshift_from'     => json_decode($basisigtifg->dayshift_from),
            'dayshift_to'       => json_decode($basisigtifg->dayshift_to),
            'middleshift_from'  => json_decode($basisigtifg->middleshift_from),
            'middleshift_to'    => json_decode($basisigtifg->middleshift_to),
            'nightshift_from'   => json_decode($basisigtifg->nightshift_from),
            'nightshift_to'     => json_decode($basisigtifg->nightshift_to),
            'affectlearning'    => json_decode($basisigtifg->affectlearning),
            'livingcondition'   => $basisigtifg->livingcondition,
            'nursinghome'       => $basisigtifg->nursinghome,
            'careunit'          => $basisigtifg->careunit,
            'livingtel'         => $basisigtifg->livingtel,
            'selfcare'          => $basisigtifg->selfcare,
            'caregiver'         => $basisigtifg->caregiver,
            'caretel'           => $basisigtifg->caretel,
            'sport'             => $basisigtifg->sport,
            'sporta1'           => $basisigtifg->sporta1,
            'sporta2'           => $basisigtifg->sporta2,
            'sportb1'           => $basisigtifg->sportb1,
            'sportb2'           => $basisigtifg->sportb2,
            'sportc1'           => $basisigtifg->sportc1,
            'sportc2'           => $basisigtifg->sportc2,
            'sportsum'          => $basisigtifg->sportsum,
            'closed'            => $basisigtifg->closed,
            'close_date'        => $basisigtifg->close_date,
            'closed_do'         => $basisigtifg->closed_do,
            'closed_year'       => $basisigtifg->closed_year,
            'closed_month'      => $basisigtifg->closed_month,
            'closedcause'       => $basisigtifg->closedcause,
            'closedreason'      => $basisigtifg->closedreason
        ];
    }

}
