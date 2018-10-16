<?php
/**
 * IonAuthModel tests
 *
 * @package CodeIgniter-Ion-Auth
 * @author  Benoit VRIGNAUD <benoit.vrignaud@zaclys.net>
 * @license https://opensource.org/licenses/MIT	MIT License
 */

use IonAuth\Models\IonAuthModel;

/**
 * IonAuthModel tests
 *
 * @package CodeIgniter-Ion-Auth
 */
class IonAuthModelTest extends \CodeIgniter\Test\CIDatabaseTestCase
{
	/**
	 * Should the db be refreshed before
	 * each test?
	 *
	 * @var boolean
	 */
	protected $refresh = false;

	/**
	 * @var IonAuthModel
	 */
	private $model;


	public function setUp()
	{
		parent::setUp();
		$this->model = new IonAuthModel();
	}

	/**
	 * Test emailCheck
	 *
	 * @return void
	 */
	public function testEmailCheck()
	{
		$this->assertTrue($this->model->emailCheck('admin@admin.com'));
		$this->assertFalse($this->model->emailCheck(''));
		$this->assertFalse($this->model->emailCheck('email@undefined.unknown'));
	}

	/**
	 * Test clearLoginAttempts()
	 *
	 * @return void
	 */
	public function testClearLoginAttempts()
	{
		$this->assertTrue($this->model->clearLoginAttempts('admin@admin.com'));
	}

	/**
	 * Test setMessage()
	 *
	 * @return void
	 */
	public function testSetMessage()
	{
		$message = 'Test string';
		$this->assertEquals($message, $this->model->setMessage($message));
	}

	/**
	 * Test testMessages()
	 *
	 * @return void
	 */
	public function testMessages()
	{
		$this->assertEmpty($this->model->messages());
	}

	/**
	 * Test testMessagesArray()
	 *
	 * @return void
	 */
	public function testMessagesArray()
	{
		$this->assertEmpty($this->model->messagesArray());
	}

	/**
	 * Test setError()
	 *
	 * @return void
	 */
	public function testSetError()
	{
		$error = 'Test string';
		$this->assertEquals($error, $this->model->setError($error));
	}

	/**
	 * Test testErrors()
	 *
	 * @return void
	 */
	public function testErrors()
	{
		$this->assertEmpty($this->model->Errors());
	}

	/**
	 * Test errorsArray()
	 *
	 * @return void
	 */
	public function testErrorsArray()
	{
		$this->assertEmpty($this->model->errorsArray());

		$this->model->setError('Test string');

		$this->assertEquals('Test string', $this->model->errorsArray(false)[0]);

		//$this->assertEquals('<span class="help-block">Test string</span>', $this->model->errorsArray()[0]);
	}

}
