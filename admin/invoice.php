<div id="cont1" class="example">
    <fieldset class="scheduler-border">
        <div class="container">
            <div class="form-row">
                <div class="col-12"><b>INVOICE</b></div>
                <p id="para"></p>
            </div>
            <form action="../scripts/gen_invoice.php" method="POST">
                <div class="form-row">
                    <div class="col">
                        <div class="form-row" style="margin-top: 5px;">
                            <div class="col-12">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">Customer's Name&nbsp;</span></div><input class="form-control" type="text" name="name">
                                </div>
                            </div>
                            <div class="col-12" style="margin-top: 5px;">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">Address</span></div><input class="form-control" type="text" name="address">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-top: 5px;">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Date</span></div><input class="form-control" type="date" name="date">
                        </div>
                    </div>
                </div>
                <div class="form-row" style="margin-top: 5px;">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Quantity</th>
                                        <th>Description</th>
                                        <th>Rate</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody id="tbdy" class="">
                                    <tr id="tr" class="package-row">
                                        <td><input type="text" inputmode="numeric" pattern="[0-9]*" autocomplete="one-time-code" placeholder="quantity" name="qty[]" class="form-control form-control-plaintext quantity" onkeyup="getValues()"></td>
                                        <td><input type="text" placeholder="description" name="dsc[]" class="form-control form-control-plaintext description"></td>
                                        <td><input type="text" placeholder="rate" name="rate[]" class="form-control form-control-plaintext rate" onkeyup="getValues()"></td>
                                        <td><input type="text" placeholder="amount" name="amt[]" class="form-control form-control-plaintext amount" readonly></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <td>
                                        <button onclick="return nrow()" type="button" class="btn"><i class="fas fa-plus"></i></button>
                                        <button onclick="return myFunction()" type="button" class="btn del"><i class="fas fa-minus"></i></button>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td><input id="total" type="text" placeholder="Total" name="amount" class="form-control form-control-plaintext" readonly></td>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="form-row" style="margin-top: 5px;">
                    <div class="col">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Amount in Words</span></div><input id="words" type="text" name="words" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6" style="margin-top: 5px;">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Customer's Sign</span>
                            </div>
                            <input class="form-control" type="text" name="csign" readonly="">
                        </div>
                    </div>
                    <div class="col-md-6" style="margin-top: 5px;">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">ITTJWIMS Sign</span>
                            </div>
                            <input class="form-control" type="text" name="isign" readonly="">
                        </div>
                    </div>

                </div>
                <div class="form-row" style="margin-top: 5px;">
                    <div class="col">
                        <button type="submit" class="btn btn-primary" name="gen_inv" onclick="getValues()" style="float: right">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </fieldset>
</div>