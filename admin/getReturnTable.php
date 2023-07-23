<?php
/**
 * @author Waruna Oshan Wisumperuma
 * @contact warunaoshan@gmail.com
 * Dec 30, 2014 4:20:47 PM
 */
session_start();
require_once '../library/config.php';
require_once '../library/functions.php';
$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];
$bill_id = $_GET['bill_id'];

$query_stock = "SELECT * FROM  tbl_bill_menu WHERE bill_id='{$_REQUEST['bill_id']}'";
$result_stock = mysql_query($query_stock) or die("Unable to select data from the tbl_stock. " . mysql_error());

if (mysql_num_rows($result_stock) != 0) {
    $total_amount = 0;
    ?>
    <table width="932" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td height="25">&nbsp;</td>
            <td align="center" >&nbsp;</td>
            <td align="center" >&nbsp;</td>
            <td align="center" >&nbsp;</td>
            <td align="center" >&nbsp;</td>
            <td align="center" ><form action="print_bil.php" method="post" name="stock_form" target="_blank" id="stock_form">
                    <input name="bill_id" id="bill_id" type="hidden" value="<?php echo $_REQUEST['bill_id']; ?>" />

                    <input type="submit" name="print" id="print" value="print" />
                </form></td>
            <td align="center" >&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td width="128" height="25">&nbsp;</td>
            <td width="27" align="center" >&nbsp;</td>
            <td width="285" align="center" class="tbl_header_right"> Name</td>

            <td width="126" align="center" class="tbl_header_right">QTY</td>
            <td width="126" align="center" class="tbl_header_right">Previous Returns</td>
            <td width="114" align="center" class="tbl_header_right">Unit Cost</td>
            <td width="94" align="center" class="tbl_header_right">Amount</td>
            <td width="94" align="center" class="tbl_header_right">Return</td>

            <td width="21">&nbsp;</td>
        </tr>
        <?php
        while ($row_stock = mysql_fetch_assoc($result_stock)) {
            $qq = $row_stock["bill_menu_qty"];

            //$total_amount +=round(($row_stock["st_price"]*$row_stock["st_qty"]),2);
            ?>
            <tr class="body_text">
                <td height="20">&nbsp;</td>
                <td width="27" align="center"  style="padding-left:3pt;">&nbsp;</td>
                <td width="285" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_stock["menu_name"]; ?></td>

                <td width="126" align="right" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_stock["bill_menu_qty"]; ?></td>
                <td width="126" align="right" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_stock["rqty"]; ?></td>
                <td width="114" align="right" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_stock["menu_price"]; ?></td>
                <td width="94" align="right" class="border_bottom_left_right" style="padding-left:3pt;"><?php echo $row_stock["total"]; ?></td>
                <td width="94" align="right" class="border_bottom_left_right" style="padding-left:3pt">
                    <input type="hidden" name="id[]" value="<?php echo $row_stock["bill_menu_id"]; ?>"/>
                    <input type="hidden" name="preReturn[]" value="<?php echo $row_stock["rqty"]; ?>"/>
                    <input name="qty[]" style="width: 95%" type="number" min="0" max="<?php echo $row_stock["bill_menu_qty"] - $row_stock["rqty"]; ?>" />
                </td>

                <td>&nbsp;</td>
            </tr>
            <?php
            //$tot+=$qq 
        }
        $query_order = "SELECT * FROM tbl_bill WHERE bill_id='$bill_id'";
        $result_order = mysql_query($query_order) or die("Unable to select data from the tbl_grn. " . mysql_error());
        $row_order = mysql_fetch_assoc($result_order);
        ?>
        <tr>
            <td height="21">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="right" class="body_text"></td>
            <td align="right" class="body_text">Gross Amount</td>
            <td align="right" class="body_text"><?php echo $row_order["total"]; ?></td>
            <td align="right" class="body_text">&nbsp;</td>
            <td align="right" class="body_text">&nbsp;</td>
            <td width="100" align="center" class="body_text" style="padding-right:3pt;"></td>
            <td width="37">&nbsp;</td>
        </tr>
        <tr>
            <td height="24">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="right" class="body_text"></td>
            <td align="right" class="body_text">Discount %</td>
            <td align="right" class="body_text"><?php echo $row_order["bill_discount"]; ?></td>
            <td align="right" class="body_text">&nbsp;</td>
            <td align="right" class="body_text">&nbsp;</td>
            <td align="center" class="body_text" style="padding-right:3pt;"></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td height="21">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="right" class="body_text"></td>
            <td align="right" class="body_text">Total Amount</td>
            <td align="right" class="body_text"><?php echo $row_order["tot"]; ?></td>
            <td align="right" class="body_text">&nbsp;</td>
            <td align="right" class="body_text">&nbsp;</td>
            <td align="center" class="body_text" style="padding-right:3pt;"></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="9">
                <input type="submit" value="Update" style="float: right"/>
            </td>
        </tr>
    </table>
    <?php
}
require_once '../library/close.php';
