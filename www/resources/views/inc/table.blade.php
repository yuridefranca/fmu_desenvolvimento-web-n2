 <!-- header -->
 <header class="header">
     <div class="th checkbox container-checkbox" id="all">
         <span><i class="material-icons">check_box_outline_blank</i></span>
         <input type="checkbox" name="all" class="checkbox-all">
     </div>

     <div class="th"><strong>Nome</strong></div>
     <div class="th"><strong>Descrição</strong></div>
     <div class="th"><strong>Preço</strong></div>
     <div class="th"><strong>Quantidade</strong></div>
     <div class="th"></div>
 </header>

 <!-- registros -->
 <div class="registros">
     @foreach($produtos as $produto)
     <div class="tr" data-produto="{{ $produto['id'] }}">
         <div class="td checkbox container-checkbox">
             <span><i class="material-icons">check_box_outline_blank</i></span>
             <input type="checkbox" name="all">
         </div>
         <div class="td">{{ $produto['nome'] }}</div>
         <div class="td">{{ $produto['descricao'] }}</div>
         <div class="td">{{ $produto['preco'] }}</div>
         <div class="td">{{ $produto['quantidade'] }}</div>
         <div class="td container_acoes">
             <a class="btn-acao delete-produto"><i class="material-icons">close</i></a>
             <a class="btn-acao edit-produto"><i class="material-icons">edit</i></a>
         </div>
     </div>
     @endforeach
 </div>