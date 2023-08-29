    <!-- Add Product Modal-->
        <div class="modal fade" id="newProduct" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-success p-4">
                        <h5 class="modal-title font-alt text-white" id="feedbackModalLabel">Add Product</h5>
                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body border-0 p-5">
                        <form id="form_event"  class="form-a" onsubmit="return false">
                              <div class="row">
                                <div class="col-md-6 mb-2">
                                  <div class="form-group">
                                <label class="pb-2" for="Type">Product Name</label>
                                <input type="text" id="_product" name="product" class="form-control form-control-md form-control-a" placeholder="" required>
                                  </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                  <div class="form-group">
                                <label class="pb-2" for="Type">Unit</label>
                                <input type="text" id="_unit" name="unit" class="form-control form-control-md form-control-a" placeholder=""required>
                                  </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                  <div class="form-group">
                                <label class="pb-2" for="Type">Price</label>
                                <input type="number" step=".01" id="_price" name="price" class="form-control form-control-md form-control-a" placeholder=""required>
                                  </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                  <div class="form-group">
                                <label class="pb-2" for="Type">Date of Expiry</label>
                                <input type="date" id="_date" name="date" class="form-control form-control-md form-control-a" placeholder=""required>
                                  </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                  <div class="form-group">
                                <label class="pb-2" for="Type">Available Inventory</label>
                                <input type="number" id="_qty" name="qty" class="form-control form-control-md form-control-a" placeholder=""required>
                                  </div>
                                </div>

                                </div>
                                <div class="col-md-12 mb-2">
                                  <div class="form-group">
                                <label class="pb-2" for="Type">Image</label>
                                  <input type="file" id="file" name="file" class="form-control form-control-a">
                                  </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                  <img src="" id="img" />
                                </div>

                                <div class="col-m3-5">
                                  <button type="submit" onclick="create()" id="_edit" class="btn bg-success text-white btn-sm col-md-2">Submit</button>
                                </div>

                                 <div class="col-md-5">
                                
                                </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- End of Event Modal-->


