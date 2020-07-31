@extends('layout.head')
@section('body')
    <div class="modal fade" tabindex="-1" role="dialog" id="dlgCarros">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" id="carros" method="POST">
                @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Novo carro</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="idCarro" id="idCarro" class="form-control">
                        <div class="form-group">
                            <label for="nomeCarro" class="control-label">Nome Carro</label>
                            <div class="input-group">
                                <input type="text" name="nome" class="form-control" id="nomeCarro">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="modeloCarro" class="control-label">Modelo</label>
                            <div class="input-group">
                                <input type="text" name="modelo" class="form-control" id="modeloCarro">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="marcaCarro" class="control-label">Marca</label>
                            <div class="input-group">
                                <select  name="marca" class="form-control" id="marcaCarro">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        
                    </div>
                </form>
            </div>
        
        </div>
    </div>
    <div class="card border">
    <div class="card-body table-responsive">
    <div class="alert alert-success" role="alert">
  A simple success alert—check it out!
</div>
        <h5 class="card-title">Carros cadastrados</h5>
        <table id="tbCarros" class="table table-ordered table-hover ">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome do Carro</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                   
            </tbody>
        </table>        
    </div>
    <div class="card-footer">
        <a class="btn-sm  btn btn-primary" href="javascript:void(0)" role="button" onClick="modalCarro()" data-toggle="modal" data-target="#dlgCarros">Novo Carro</a>
        
    </div>
</div>


    
@endsection
@section('javascript')
    <script type="text/javascript" >
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':'{{csrf_token()}}'
        }
    });
        function modalCarro(){ //limapndo dados do modal caso cancele
            $('#nomeCarro').val('');
            $('#modeloCarro').val('');
            $('#marcaCarro').val('');
            $("#dlgCarros").show();
        }
        function montarLinha(row){
            var linha = "<tr>"+
            "<td>" + row.id + "</td>" +
            "<td>" + row.nome + "</td>" +
            "<td>" + row.modelo + "</td>" +
            "<td>" + row.marcaCarro + "</td>" +
            "<td class='d-flex justify-content-around'>" + 
                '<button class="btn btn-xs btn-primary" onClick="editar(' + row.id + ') " data-toggle="modal" data-target="#dlgCarros">Editar</button>' + '<button class="btn btn-xs btn-danger" onClick="remover(' + row.id + ')">Apagar</button>' + "</td>" +
            "</tr>";
            return linha;
        }
        //funcao editar
        function editar(id){
            $.getJSON('/api/carros/'+id,function(data){
                console.log(data);
                $('#idCarro').val(data.id);
                $('#nomeCarro').val(data.nome);
                $('#modeloCarro').val(data.modelo);
                $('#marcaCarro').val(data.marca);
                $("#dlgCarros").show();
            });
        }
        //funcao remover
        function remover(id){
            $.ajax({
                type:"DELETE",
                url:"/api/carros/" + id,
                context:this,
                success:function(){
                    var linhas = $("#tbCarros>tbody>tr");
                    console.log(linhas);
                    var e = linhas.filter(function(i,elemento){
                        return elemento.cells[0].textContent == id;
                        });
                    if(e){
                        e.remove();
                    }    
                },
                error:function(){
                    console.log("deu ruim");
                }
            });
        };
        function carregarCarros(){
            $.getJSON('/api/carros',function(carros){
                
                for(var i=0;i<carros.length;i++){
                   var linha = montarLinha(carros[i]);
                    $("#tbCarros>tbody").append(linha);
                    
                }
                
            });
        }
        function carregarMarcas(){//pegando marca de carro e montando no option
            $.getJSON('/api/marca',function(data){
                
                for(var i=0;i<data.length;i++){
                   var opcao = '<option value="' + data[i].id + '">' + data[i].nome + '</option>';
                    $("#marcaCarro").append(opcao);
                }
                
            });
        }
        carregarCarros();
        carregarMarcas();
        //criando funcao para editar carro
        function salvandoCarro(){
            car = {
                id:$("#idCarro").val(),
                nome:$("#nomeCarro").val(),
                marca:$("#marcaCarro").val(),
                modelo:$("#modeloCarro").val(),

            };
            $.ajax({
                type:"PUT",
                url:"/api/carros/" + car.id,
                context:this,
                data:car,
                success:function(data){
                    var carroAtualizado = JSON.parse(data);
                    var linhas = $("#tbCarros>tbody>tr");
                    var e = linhas.filter(function(i,elemento){
                        return elemento.cells[0].textContent == carroAtualizado.id;
                        });
                    if(e){
                        e[0].cells[0].textContent = carroAtualizado.id;
                        e[0].cells[1].textContent = carroAtualizado.nome;
                        e[0].cells[2].textContent = carroAtualizado.modelo;
                        e[0].cells[3].textContent = carroAtualizado.marca;
                    }    
                },
                error:function(){
                    console.log("deu ruim");
                }
            });
        }
        //criando funcao para adicionar carro
        function criarCarro(){
            car = {
                nome:$("#nomeCarro").val(),
                marca:$("#marcaCarro").val(),
                modelo:$("#modeloCarro").val(),

            };
            $.post("/api/add",car,function(data){
                var carros = JSON.parse(data);
                var linha = montarLinha(carros);
                    $("#tbCarros>tbody").append(linha);
            });
        }
        $("#carros").submit(function(event){
            event.preventDefault();
            if($("#idCarro").val() != ''){
                salvandoCarro();
                $("#dlgCarros").modal("hide");
            }else{
                criarCarro();
                $("#dlgCarros").modal("hide");
            }
        })
    </script>
@endsection
