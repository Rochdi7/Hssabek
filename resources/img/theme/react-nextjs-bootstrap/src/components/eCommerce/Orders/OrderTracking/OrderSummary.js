"use client";

import { Card, Table } from "react-bootstrap";

const OrderSummary = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h3 className="mb-3 mb-lg-4">Order Summary</h3>

          <div className="default-table-area">
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
                    <td className="text-secondary fw-medium text-end">$1,000.00</td>
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
                    <td className="text-secondary fw-medium text-end">$900.00</td>
                  </tr>
                </tbody>
              </Table>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default OrderSummary;
