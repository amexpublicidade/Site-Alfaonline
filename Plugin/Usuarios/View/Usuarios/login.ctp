<h1 class="logo"><img src="Usuarios/img/header_logo.png" /></h1>

<?PHP
echo $this->Form->create("Usuario", array('id' => 'login'));
echo '<h1>' . __("Login") . '</h1>';
if (isset($message)) echo $this->Html->div('message', $message);
echo $this->Form->input("username", array('label' => __("Usuário")));
echo $this->Form->input("password", array('label' => __("Senha")));
echo $this->Form->end(__("Login"));
?>