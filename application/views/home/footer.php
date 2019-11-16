<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Solicitação de exclusão</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja excluir?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
                <a href="#" id="modal-delete-yes" class="btn btn-primary">Sim</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>

    $(document).ready(function () {
        $('.btn-excluir').click(function () {
            var controllerName = '<?php echo $controllerName; ?>';
            var baseUrl = '<?php echo base_url(); ?>';
            $('#modal-delete-yes').attr("href", baseUrl + controllerName + "/delete/" + $(this).attr('id'));
        });
    });

</script>

                                </div>
                                <!-- /.card -->
                                
                                <?php if($this->uri->segment(2) && $this->uri->segment(2) != 'index') { ?>
                                    <!-- ./card-body -->
                                    <div class="card-footer">
                                        <a href="<?php echo base_url() . $controllerName ?>" class="btn btn-outline-secondary btn-lg">Voltar</a>
                                        <button type="submit" class="btn btn-outline-success btn-lg" style="width: 170px;">Enviar</button>
                                    </div>
                                <?php } ?>
                                </form>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                    </div><!--/. container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <footer class="main-footer">
                Versão 1.0
            </footer>
        </div>
        <!-- ./wrapper -->
    </body>
</html>
