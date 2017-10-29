<?php
namespace App\Http\Middleware;

use App\Models\Institute\Institute;
use App\Helpers\Database\TenantConnector;
use Closure;
use Exception;

/**
 * Class Tenant
 */
class Tenant
{
    use TenantConnector;

    /**
     * @var \App\Models\Institute\Institute
     */
    protected $institute;

    /**
     * Tenant constructor
     * @param \App\Models\Institute\Institute
     */
    public function __construct(Institute $institute)
    {
        $this->institute = $institute;
    }

    /**
     * Handle incoming request
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $domain = $request->root();
        // dd($domain);
        $institute = Institute::where('domain', $domain)->first();

        if(!$institute) {
            throw new Exception("Unknown Institute", 1);
        }

        session(['tenant' => $institute]);

        return $next($request);
    }
}
