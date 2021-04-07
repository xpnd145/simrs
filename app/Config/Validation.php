<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	public $signup = [
		'nip' => 'required|is_unique[petugas.nip]',
		'nama' => 'required',
		'jk' => 'required|in_list[L,P,l,p]',
		'tgl_lahir' => 'required|valid_date',
		'password' => 'required|min_length[8]',
		'konf_password' => 'required|matches[password]'
	];
	public $signup_errors = [
		'nip' => [
			'is_unique' => 'Maaf data sudah ada'
		],
		'nama' => [
			'required' => 'Nama tidak boleh kosong'
		],
		'jk' => [
			'required' => 'Jenis kelamin tidak boleh kosong',
			'in_list' => 'Jenis kelamin tidak diperbolehkan'
		],
		'tgl_lahir' => [
			'required' => 'Tanggal lahir tidak boleh kosong',
			'valid_date' => 'Format tanggal tidak sesuai (dd-mm-yyyy)'
		],
		'password' => [
			'required' => 'Password tidak boleh kosong',
			'min_length' => 'Minimal 8 karakter'
		],
		'konf_password' => [
			'required' => 'Password tidak boleh kosong',
			'matches' => 'Password tidak tidak cocok'
		]
	];
}
