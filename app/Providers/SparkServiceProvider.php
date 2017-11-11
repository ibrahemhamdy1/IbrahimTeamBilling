<?php

namespace App\Providers;

use Laravel\Spark\Spark;
use Laravel\Spark\Providers\AppServiceProvider as ServiceProvider;

class SparkServiceProvider extends ServiceProvider
{
    /**
     * Your application and company details.
     *
     * @var array
     */
    protected $details = [
        'vendor' => 'Your Company',
        'product' => 'Your Product',
        'street' => 'PO Box 111',
        'location' => 'Your Town, NY 12345',
        'phone' => '555-555-5555',
    ];

    /**
     * The address where customer support e-mails should be sent.
     *
     * @var string
     */
    protected $sendSupportEmailsTo = null;

    /**
     * All of the application developer e-mail addresses.
     *
     * @var array
     */
    protected $developers = [
        //
    ];

    /**
     * Indicates if the application will expose an API.
     *
     * @var bool
     */
    protected $usesApi = true;

    /**
     * Finish configuring Spark for the application.
     *
     * @return void
     */
    public function booted()
    {
        Spark::useStripe()->noCardUpFront()->teamTrialDays(10);

        
        Spark::teamPlan('Basic', 'provider-id-1')
            ->price(10)
            ->maxTeamMembers(1)
            ->features([
                'only for One  User', 'Second', 'Third'
            ]);


            Spark::teamPlan('Second Basic', 'provider-id-2')
            ->price(30)
            ->maxTeamMembers(3)
            ->features([
                'only for 3  Users', 'Second', 'Third'
            ]);


            Spark::teamPlan('Third Basic', 'provider-id-3')
            ->price(50)
            ->maxTeamMembers(5)
            ->features([
                'only for 3  Users', 'Second', 'Third'
            ]);
    }
}
