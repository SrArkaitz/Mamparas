<?php $__env->startSection('content'); ?>

    <!--DUCHA-->
    <div>
        <h1 class="text-center">Duchas</h1>
        <hr>
        <?php if(count($mamparasDucha)==0): ?>
            <br>
            <h5 class="text-center text-secondary">Los sentimos, no hay ninguna mampara de momento. Vuelva más tarde</h5>
        <?php else: ?>
        <?php $__currentLoopData = $mamparasDucha; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ducha): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row mb-2">
                <div class="col-12">
                    <div class="card mt-3 mb-3" >
                        <div class="card-body">
                            <h5  class="card-title font-weight-bold text-uppercase"><?php echo e($ducha->nombre); ?> <span class="card-text text-capitalize text-secondary small ml-3"><?php echo e($ducha->color); ?></span></h5>
                            <p class="card-text">Tipo de cristal: <?php echo e($ducha->tipoCristal); ?></p>
                            <div class="row">
                                <p class="col-12 col-md-6"> Perfil: <?php echo e($ducha->perfil); ?></p>
                                <p class="col-12 col-md-6 mb-sm-3 card-text">Estimación: <?php echo e($ducha->estimacionPrecio); ?>€ </p>
                            </div>
                            <a href="<?php echo e(Route('detalleMampara', $ducha->id)); ?>" class="card-link">Ver mampara</a>
                            <?php if(Auth::check()): ?>
                                <a class="card-link" href="<?php echo e(Route('mampara.editar', $ducha->id)); ?>">Editar</a>
                                <a class="card-link" href="<?php echo e(Route('mampara.delete', $ducha->id)); ?>">Borrar</a>
                            <?php else: ?>
                                <a href="" class="card-link" data-toggle="modal" data-target="#contactar<?php echo e($ducha->id); ?>">Contactar</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="contactar<?php echo e($ducha->id); ?>" tabindex="-1" role="dialog" aria-labelledby="contactar" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="contactarLabel">Contactar con Mamparas Jesús</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <label for="titulo">Nombre:*</label>
                                <input class="form-control" type="text" id="nombrePersona<?php echo e($ducha->id); ?>" required>
                                <br>
                                <label for="titulo">Apellido:*</label>
                                <input class="form-control" type="text" id="apellidoPersona<?php echo e($ducha->id); ?>" required>
                                <br>
                                <label for="titulo">Email:*</label>
                                <input class="form-control" type="text" id="emailPersona<?php echo e($ducha->id); ?>" required>
                                <br>
                                <label for="titulo">Confirmación de email:*</label>
                                <input class="form-control" type="text" id="emailPersona2<?php echo e($ducha->id); ?>" required>
                                <br>
                                <label for="titulo">Teléfono:*</label>
                                <input class="form-control" type="text" id="telefonoPersona<?php echo e($ducha->id); ?>" required>
                                <br>
                                <label for="titulo">Mensaje:</label>
                                <textarea id="mensaje<?php echo e($ducha->id); ?>" style="width: 100%" required></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary" onclick="contactarEmpresa(<?php echo e($ducha->id); ?>)">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="row paginacion d-flex justify-content-center">
            <?php echo e($mamparasDucha->appends(['p1' => $mamparasDucha->currentPage(), 'p2' => $mamparasBañera->currentPage()])->links()); ?>

        </div>
        <?php endif; ?>
        <!--BAÑERA-->
        <h1 class="text-center mt-5">Bañera</h1>
        <hr>
        <?php if(count($mamparasBañera)==0): ?>
            <br>
            <h5 class="text-center text-secondary">Los sentimos, no hay ninguna mampara de momento. Vuelva más tarde</h5>
        <?php else: ?>
        <?php $__currentLoopData = $mamparasBañera; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bañera): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row mb-2">
                <div class="col-12">
                    <div class="card mt-3 mb-3" >
                        <div class="card-body">
                            <h5  class="card-title font-weight-bold text-uppercase"><?php echo e($bañera->nombre); ?> <span class="card-text text-capitalize text-secondary small ml-3"><?php echo e($bañera->color); ?></span></h5>
                            <p class="card-text">Tipo de cristal: <?php echo e($bañera->tipoCristal); ?></p>
                            <div class="row">
                                <p class="col-12 col-md-6">Perfil: <?php echo e($bañera->perfil); ?></p>
                                <p class="col-12 col-md-6 mb-sm-3 card-text ">Estimación: <?php echo e($bañera->estimacionPrecio); ?>€</p>
                            </div>
                            <a href="<?php echo e(Route('detalleMampara', $bañera->id)); ?>" class="card-link">Ver mampara</a>
                            <?php if(Auth::check()): ?>
                                <a class="card-link" href="<?php echo e(Route('mampara.editar', $bañera->id)); ?>">Editar</a>
                                <a class="card-link" href="<?php echo e(Route('mampara.delete', $bañera->id)); ?>">Borrar</a>
                            <?php else: ?>
                                <a href="" class="card-link" data-toggle="modal" data-target="#contactar<?php echo e($bañera->id); ?>">Contactar</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="contactar<?php echo e($bañera->id); ?>" tabindex="-1" role="dialog" aria-labelledby="contactar" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="contactarLabel">Contactar con Mamparas Jesús</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <label for="titulo">Nombre:*</label>
                                <input class="form-control" type="text" id="nombrePersona<?php echo e($bañera->id); ?>" required>
                                <br>
                                <label for="titulo">Apellido:*</label>
                                <input class="form-control" type="text" id="apellidoPersona<?php echo e($bañera->id); ?>" required>
                                <br>
                                <label for="titulo">Email:*</label>
                                <input class="form-control" type="text" id="emailPersona<?php echo e($bañera->id); ?>" required>
                                <br>
                                <label for="titulo">Confirmación de email:*</label>
                                <input class="form-control" type="text" id="emailPersona2<?php echo e($bañera->id); ?>" required>
                                <br>
                                <label for="titulo">Teléfono:*</label>
                                <input class="form-control" type="text" id="telefonoPersona<?php echo e($bañera->id); ?>" required>
                                <br>
                                <label for="titulo">Mensaje:</label>
                                <textarea id="mensaje<?php echo e($ducha->id); ?>" style="width: 100%" required></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary" onclick="contactarEmpresa(<?php echo e($bañera->id); ?>)">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="row paginacion d-flex justify-content-center">
            <?php echo e($mamparasBañera->appends(['p1' => $mamparasDucha->currentPage(), 'p2' => $mamparasBañera->currentPage()])->links()); ?>

        </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<script>
    function contactarEmpresa(id) {
        let nombre = $( "#nombrePersona"+id ).val();
        let email = $('#emailPersona'+id).val();
        let emailConfirmacion = $('#emailPersona2'+id).val();
        let telefono = $('#telefonoPersona'+id).val();
        let mensaje = $('#mensaje'+id).val();
        var expRegMovil = /^(\+34|0034|34)?[6|7|8|9][0-9]{8}$/;
        var expRegNombre = /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/;

        if(nombre != "" || email != "" || emailConfirmacion != "" || telefono != "" || mensaje != ""){
            if(email == emailConfirmacion){
                if(expRegNombre.exec(nombre)){
                    if(expRegMovil.exec(telefono)){
                        $.ajax({
                            method: "post",
                            url: '/mampara/contactar',
                            data: {
                                "_token": "<?php echo e(csrf_token()); ?>",
                                "id": id,
                                "nombre": nombre,
                                "email": email,
                                "telefono": telefono,
                                "mensaje": mensaje
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (data) {
                                alert('yes')
                            },
                            error: function (data) {
                                console.log("Error");
                                console.log(data);
                            }
                        });
                    }else{
                        //ERROR
                        console.log('Error')
                    }
                }else{
                    //ERROR
                    console.log('Error')
                }
            }else{
                //ERROR
                console.log('Error')
            }
        }else{
            //ERROR
            console.log('Error')
        }
    }
</script>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/Code/resources/views/index.blade.php ENDPATH**/ ?>