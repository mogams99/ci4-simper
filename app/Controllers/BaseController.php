<?php

namespace App\Controllers;

use App\Models\User_model;
use App\Models\Category_model;
use App\Models\Location_model;
use App\Models\LogPengguna_model;
use App\Models\Product_model;
use App\Models\Transac_model;
use App\Models\Unit_model;
use App\Models\Vendor_model;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['Rupiah_helper'];
	protected $PenggunaModel;
	protected $KategoriModel;
	protected $LokasiModel;
	protected $SatuanModel;
	protected $VendorModel;
	protected $ProdukModel;
	protected $TransaksiModel;
	protected $logModel;


	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.: $this->session = \Config\Services::session();

		$this->db = \Config\Database::connect('default');

		$this->PenggunaModel = new User_model();

		$this->KategoriModel = new Category_model();

		$this->LokasiModel = new Location_model();
		
		$this->SatuanModel = new Unit_model();

		$this->VendorModel = new Vendor_model();

		$this->ProdukModel = new Product_model();

		$this->TransaksiModel = new Transac_model();

		$this->logModel = new LogPengguna_model();
	}
}
