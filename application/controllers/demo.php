<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Demo extends CI_Controller {

	public function index()
	{
		$this->load->config('pagseguro');
		$this->load->library('pagsegurolibrary/pagseguro', 'pagseguro');

		/* Página de Retorno */
		$pgRetorno = base_url('/payment/callback');

		/* Dados Compra */
		$pgCompra = array(
			array(
				'description' => 'Doação pela contribuição',
				'amount' => 1.00
				'quantity' => 1
				)
			);

		/* Dados Cliente */
		$pgCliente = array();
		$pgCliente['client_name'] = 'Fulano';
		$pgCliente['client_email'] = 'contato@fulano.net';
		$pgCliente['client_ddd'] = '65';
		$pgCliente['client_phone'] = '55555555';

		/* Dados Frete */
		$shipping = array();
		$shipping['frete'] = 3;
		$shipping['cep'] = '78280-000';
		$shipping['rua'] = 'Av. Getúlio Vargas';
		$shipping['numero'] = '123';
		$shipping['complemento'] = '';
		$shipping['bairro'] = 'Centro';
		$shipping['cidade'] = 'Cuiabá';
		$shipping['estado'] = 'Mato Grosso';
		$shipping['pais'] = 'Brasil';

		/* Referência (ID da Compra)*/
		$pgReference = '4';

		/* Gera URL da Pagamento */
		$paymentURL = $this->pagseguro->requestPayment($pgCompra, $pgCliente, $pgReference, $shipping, $pgRetorno);

		/* Redireciona para o PagSeguro */
		redirect($paymentURL);
	}

}

/* End of file demo.php */
/* Location: ./application/controllers/demo.php */