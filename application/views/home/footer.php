  
                                </div>
                                <!-- /.card -->
                                
                                <?php if($this->uri->segment(2) && $this->uri->segment(2) != 'index') { ?>
                                    <!-- ./card-body -->
                                    <div class="card-footer">
                                        <a href="<?php echo base_url() . $controllerName ?>" class="btn btn-default">Voltar</a>
                                        <button type="submit" class="btn btn-primary">Enviar</button>
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
                <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 3.0.0-rc.5
                </div>
            </footer>
        </div>
        <!-- ./wrapper -->
    </body>
</html>
