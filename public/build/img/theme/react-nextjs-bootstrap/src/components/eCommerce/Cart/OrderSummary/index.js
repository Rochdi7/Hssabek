"use client";

import { Card, Table } from "react-bootstrap";

const OrderSummary = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h3 className="mb-3 mb-lg-4">Order Summary</h3>

          <div className="default-table-area mb-3 mb-lg-4">
            <div className="table-responsive">
              <Table className="table align-middle">
                <thead>
                  <tr>
                    <th scope="col">Description</th>
                    <th scope="col" className="text-end">
                      Price
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Grand Total :</td>
                    <td className="text-end">$1,105.00</td>
                  </tr>
                  <tr>
                    <td>Discount :</td>
                    <td className="text-end">-$105.00</td>
                  </tr>
                  <tr>
                    <td>Tax :</td>
                    <td className="text-end">$75.00</td>
                  </tr>
                  <tr>
                    <td className="text-secondary fw-medium">Subtotal :</td>
                    <td className="text-secondary fw-medium text-end">
                      $1,000.00
                    </td>
                  </tr>
                  <tr>
                    <td>Shipping Charge :</td>
                    <td className="text-end">$80.00</td>
                  </tr>
                  <tr>
                    <td>Coupon Charge :</td>
                    <td className="text-secondary text-end">$20.00</td>
                  </tr>
                  <tr>
                    <td className="text-secondary fw-medium">Total :</td>
                    <td className="text-secondary fw-medium text-end">
                      $900.00
                    </td>
                  </tr>
                </tbody>
              </Table>
            </div>
          </div>

          <form>
            <div className="form-group">
              <label className="label fs-15 fw-bold text-secondary">
                Add A Note
              </label>
              <textarea
                rows="5"
                className="form-control"
                placeholder="Write here"
              ></textarea>
            </div>

            <button
              type="submit"
              className="btn btn-primary py-2 px-md-4 px-3 fa-16 fw-medium mt-lg-4 mt-3"
            >
              <div className="d-flex align-items-center py-md-1">
                <span className="material-symbols-outlined fs-20 me-1 text-white">
                  add
                </span>
                <span>Proceed To Shipping</span>
              </div>
            </button>
          </form>
        </Card.Body>
      </Card>
    </>
  );
};

export default OrderSummary;
