<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title><?php echo $titulo ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/bootstrap.css'); ?>">

    <script type="text/javascript" src="<?php echo base_url('public/js/jquery-1.11.2.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/js/bootstrap.js'); ?>"></script>
    
  </head>
  <body>
    <div class="container">
        <form role="form" style="margin-top: 5%;" action="<?php echo base_url('email/enviar_email/')?>" method="post">
            <legend>Enviar Email - Do Gmail para Todos</legend>
            <?php
                echo validation_errors('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>','</div>');
            ?>
            <div class="form-group">
                <label for="seu_nome">Seu Nome:</label>
                <input type="text" class="form-control" name="seu_nome" id="seu_nome" value="<?php echo set_value('seu_nome'); ?>" style="width: 50%;" required>
            </div>
            <div class="form-group">
                <label for="seu_email">Seu Email:</label>
                <input type="email" class="form-control" name="seu_email" id="seu_email" value="<?php echo set_value('seu_email'); ?>" style="width: 50%;" required>
            </div>
            <div class="form-group">
                <label for="sua_senha">Sua Senha:</label>
                <input type="password" class="form-control" name="sua_senha" id="sua_senha" value="<?php echo set_value('sua_senha'); ?>" style="width: 25%;" required>
            </div>
            <div class="form-group">
                <label for="email_destino">Email de Destino:</label>
                <input type="email" class="form-control" name="email_destino" id="email_destino" value="<?php echo set_value('email_destino'); ?>" style="width: 50%;" required>
            </div>
            <div class="form-group">
                <label for="titulo_email">Título Email:</label>
                <input type="text" class="form-control" name="titulo_email" id="titulo_email" value="<?php echo set_value('titulo_email'); ?>" style="width: 50%;" required>
            </div>
            <div class="form-group">
                <label for="texto"  >Texto:</label>
                <textarea rows="5" class="form-control" name="texto" id="texto"><?php echo set_value('texto'); ?></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
  </body>
</html>