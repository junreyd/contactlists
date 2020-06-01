<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Contact List</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.css'?>">
</head>
<body>
<div class="container">
        <div class="row">
            <h1 class="page-header">Contact
                <small>List</small>
				<div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_add"><span class="fa fa-plus"></span> Add Contact</a></div>
            </h1>
        </div>
	<div class="row">
		<div id="reload">
		<table class="table table-striped" id="mydata">
			<thead>
				<tr>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Email</th>
                    <th>Contact #</th>
					<th style="text-align: right;">Action</th>
				</tr>
			</thead>
			<tbody id="table_tbody"></tbody>
		</table>
		</div>
	</div>
</div>

		<!--START MODAL ADD -->
        <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title">Add Contact</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Firstname</label>
                        <div class="col-xs-9">
                            <input id="fname_id" class="form-control" type="text" placeholder="Firstname" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Lastname</label>
                        <div class="col-xs-9">
                            <input id="lname_id" class="form-control" type="text" placeholder="Lastname" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Email</label>
                        <div class="col-xs-9">
                            <input id="email_id" class="form-control" type="text" placeholder="Email" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Contact #</label>
                        <div class="col-xs-9">
                            <input id="contact_id" class="form-control" type="text" placeholder="Contact #" style="width:335px;" required>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-info" id="btn_save">Save</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD-->

        <!--START MODAL EDIT -->
        <div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title">Edit Contact</h3>
            </div>
            <form class="form-horizontal">
            <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Firstname</label>
                        <div class="col-xs-9">
                            <input id="item_id" class="form-control" type="hidden">
                            <input id="fname_id_edit" class="form-control" type="text" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Lastname</label>
                        <div class="col-xs-9">
                            <input id="lname_id_edit" class="form-control" type="text" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Email</label>
                        <div class="col-xs-9">
                            <input id="email_id_edit" class="form-control" type="text" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Contact #</label>
                        <div class="col-xs-9">
                            <input id="contact_id_edit" class="form-control" type="text" style="width:335px;" required>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-info" id="btn_update">Update</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL EDIT-->

        <!--START MODAL DELETE-->
        <div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title">Delete Contact</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                          
                            <input type="hidden" id="item_id_delete" value="">
                            <div class="alert alert-warning"><p>Are you sure you want to delete this item?</p></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button class="btn_delete btn btn-danger" id="btn_delete">Delete</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL DELETE-->

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		contact_data();
		
        $('#mydata').dataTable();
    
		 
		//DISPLAY CONTACT LIST
		function contact_data(){
		    $.ajax({
		        type  : 'GET',
		        url   : '<?php echo base_url()?>index.php/contact/contact_data',
		        async : true,
		        dataType : 'json',
		        success : function(data){
		            var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
		                html += '<tr>'+
		                        '<td>'+data[i].fname+'</td>'+
                                '<td>'+data[i].lname+'</td>'+
		                  		'<td>'+data[i].email+'</td>'+
		                  		'<td>'+data[i].contact_num+'</td>'+
		                        '<td style="text-align:right;">'+
                                    '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="'+data[i].id+'">Edit</a>'+' '+
                                    '<a href="javascript:;" class="btn btn-danger btn-xs item_delete" data="'+data[i].id+'">Delete</a>'+
                                '</td>'+
		                        '</tr>';
		            }
		            $('#table_tbody').html(html);
		        }

		    });
        }
        
        //POST
		$('#btn_save').on('click',function(){
            var fname = $('#fname_id').val();
            var lname = $('#lname_id').val();
            var email = $('#email_id').val();
            var contact = $('#contact_id').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/contact/postItem')?>",
                dataType : "JSON",
                data : {fname:fname, lname:lname, email:email, contact:contact},
                success: function(data){
                    $('#fname_id').val("");
                    $('#lname_id').val("");
                    $('#email_id').val("");
                    $('#contact_id').val("");
                    $('#modal_add').modal('hide');
                    contact_data();
                }
            });
            return false;
        });

		//GET UPDATE
		$('#table_tbody').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('index.php/contact/getID')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                	$.each(data,function(id, fname, lname, email, contact){
                        $('#modal_edit').modal('show');
                        console.log(data.id);
                        
                        $('#item_id').val(data.id);
                        $('#fname_id_edit').val(data.fname);
                        $('#lname_id_edit').val(data.lname);
                        $('#email_id_edit').val(data.email);
                        $('#contact_id_edit').val(data.contact);
            		});
                }
            });
            return false;
        });

        //UPDATE
		$('#btn_update').on('click',function(){
            var id = $('#item_id').val();
            var fname = $('#fname_id_edit').val();
            var lname = $('#lname_id_edit').val();
            var email = $('#email_id_edit').val();
            var contact = $('#contact_id_edit').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/contact/updateItem')?>",
                dataType : "JSON",
                data : {id:id, fname:fname, lname:lname, email:email, contact:contact},
                success: function(data){
                    $('#fname_id_edit').val("");
                    $('#lname_id_edit').val("");
                    $('#email_id_edit').val("");
                    $('#contact_id_edit').val("");
                    $('#modal_edit').modal('hide');
                    contact_data();
                }
            });
            return false;
        });

        //GET ITEM ID
		$('#table_tbody').on('click','.item_delete',function(){
            var id=$(this).attr('data');
            $('#modal_delete').modal('show');
            $("#item_id_delete").val(id);
        });

        //DELETE
        $('#btn_delete').on('click',function(){
            var id=$('#item_id_delete').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/contact/deleteItem')?>",
            dataType : "JSON",
                    data : {id: id},
                    success: function(data){
                            $('#modal_delete').modal('hide');
                            contact_data();
                    }
                });
                return false;
            });

	});

</script>
</body>
</html>