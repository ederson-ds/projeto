  
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
                <div class="float-right d-none d-sm-inline-block">
                    <b>Versão</b> 1.0
                </div>
            </footer>
        </div>
        <!-- ./wrapper -->
    </body>
</html>
