/**
 * This plugin is an script 
 *
 * @version 1.0.0 - Created
 * @author Yuri Serafim
 * 
 */
let Script;
Script = function (params) {
    'use strict';
    
    let __default = {
        scope: 'page'
    };

    this.config = $.extend(true, {}, __default, params);

    this.DOM = {
        body: $('body'),
        btn_modal_create: $("#create"),
        btn_modal_edit: $(".edit-produto"),
        btn_pesquisar: $(".pesquisar"), 
        input_pesquisar: $("#search"),  
        btn_delete: $(".delete-produto"),
        btn_delete_selected: $("#delete"),
        checkbox_all: $(".checkbox-all"),
        container_checkbox: $(".container-checkbox"),
        input_preco: $(".input-preco"),
        btn_cadastrar: $("#btn_cadastrar"),
        btn_editar: $("#btn_editar"),
        container_table: $(".resultados"),

    }

    this.loading_params = {
        scope: $('.loader')
    };

    Object.freeze(this.loading_params);
    Object.freeze(this.config);
    Object.seal(this.DOM);

    this.events();
    this.table_events();
}

Script.prototype = {
    events: function() {
        let self = this;

        self.DOM.btn_modal_create.on("click", function(e) {
            $("#modal_create :input").val("");
            $("#modal_create").modal('show');
        });

        self.DOM.input_pesquisar.on('keyup', function() {
            let url = "/produtos";
            let data = $("div.pesquisa :input").serialize();
            self.ajax_table(data);
        });

        self.DOM.btn_delete_selected.on("click", function () {
            let selected = $('div.tabela .registros input[type="checkbox"]:checked')
            selected.each(function(i, v) {
                let parentObj = $(v).parents('.tr');
                let id = parentObj.data('produto');
                self.delete(id);
            })
        })

        self.DOM.input_preco.on('input', function(){
            self.maskMoney($(this));
        });

        self.DOM.btn_cadastrar.on('click', function() {
            let url = "/produtos";
            let token = $('meta[name="csrf-token"]').attr('content');
            let data = $("#modal_create .modal-body :input").serialize();
            data = data + "&_token="+token;

            self.create(url, data);
        });

        self.DOM.btn_editar.on("click", function() {
            let id = $(this).data('id_produto');
            let url = "/produtos/" + id;
            let token = $('meta[name="csrf-token"]').attr('content');
            let data =  $("#modal_edit .modal-body :input").serialize();
            data = data + "&_token="+token;
            
            self.update(url, data);
        })
    },

    table_events: function() {
        let self = this;

        self.DOM.container_table.find(".delete-produto").on("click", function() {
            let id = $(this).parents('div.tr').data('produto');
            let confirmed = confirm("Você realmente deseja excluir esse produto?");
            if(confirmed){
                self.delete(id);
            }
        });

        self.DOM.container_table.find(".edit-produto").on("click", function() {
            let id = $(this).parents('.tr').data('produto');
            self.fill_modal(id);
            $("#modal_edit").find('.btn-submit').data("id_produto", id);
            $("#modal_edit").modal('show');
        });

        self.DOM.container_table.find(".container-checkbox").on("click", function() {
            let checked = $(this).find('input[type="checkbox"]').prop("checked");

            if(!checked) {
                $(this).find("span").html('<i class="material-icons">check_box</i>');                
                $(this).find('input[type="checkbox"]').prop("checked", true).trigger("change");
            } else {
                $(this).find("span").html('<i class="material-icons">check_box_outline_blank</i>');
                $(this).find('input[type="checkbox"]').prop("checked", false).trigger("change");
            }
        });

        self.DOM.container_table.find(".checkbox-all").on("change", function() {
            let container_checkbox = $(this).parents("div.tabela").find(".registros > .tr > .td.checkbox");
            let checked = $(".checkbox-all").prop("checked");
            
            container_checkbox.each(function(i, v) {
                if(checked) {
                    $(v).find("span").html('<i class="material-icons">check_box</i>');                
                    $(v).find('input[type="checkbox"]').prop("checked", true).trigger("change");
                } else {
                    $(v).find("span").html('<i class="material-icons">check_box_outline_blank</i>');
                    $(v).find('input[type="checkbox"]').prop("checked", false).trigger("change");
                }
            });
        });
    },

    create: function(url, data) {
        $.ajax({
            url: url,
            method: "POST",
            data: data,
        }).done(function(result){
            if(result.success == true){
                $("#modal_create").modal("hide");
                $("#modal_success").find(".modal-success").text("Você conseguiu inserir o produto com sucesso !");
                $("#modal_success").modal("show");
            }
            script.ajax_table([]);
        })
    },

    delete: function(id) {
        let url = "/produtos/" + id;
        $.ajax({
            url: url,
            method: "GET"
        }).done(function(result) {
           if(result.success == true) {
            $("#modal_create").modal("hide");
            $("#modal_success").find(".modal-success").text("Você conseguiu excluir o produto com sucesso !");
            $("#modal_success").modal("show");
           }
           script.ajax_table([]);
        });
    },

    update:function(url, data) {
        $.ajax({
            url: url,
            method: "PATCH",
            data: data,
        }).done(function(result) {
            if(result.success) {
                $("#modal_edit").modal("hide");
                $("#modal_success").find(".modal-success").text("Você conseguiu editar o produto com sucesso !");
                $("#modal_success").modal("show");
                script.ajax_table([]);
            }
        });
    },

    maskMoney: function(domObj) {
        domObj.mask("#.##0,00", {reverse: true});
    },

    fill_modal: function(id) {
        let url = "/produtos/show/" + id;
        
        $.ajax({
            url: url,
            method: "GET"
        }).done(function(result) {
            $("#modal_edit").find(".input-nome").val(result.data.nome)
            $("#modal_edit").find(".input-descricao").val(result.data.descricao)
            $("#modal_edit").find(".input-preco").val(result.data.preco)
            $("#modal_edit").find(".input-quantidade").val(result.data.quantidade)
            $("#modal_edit").find(".btn.btn-submit").data('id_produto', id)
        });
    },

    ajax_table: function(data) {
        let url = '/produtos';
        $.ajax({
            url: url,
            data: data
        }).done(function(result) {
            $("div.tabela").html(result);
            script.table_events();
        });
    }
}

$(document).ready(function () {
    script = new Script();
});