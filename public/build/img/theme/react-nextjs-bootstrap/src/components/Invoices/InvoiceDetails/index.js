"use client";

import { Row, Col, Card, Table } from "react-bootstrap";
import Image from "next/image";

const InvoiceDetails = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <Row>
            <Col sm={4} md={4} lg={4}>
              <div className="mb-4">
                <p className="mb-4">
                  Invoice Number: <span className="text-secondary">#1346</span>
                </p>
                <p className="mb-1">Invoice To:</p>
                <p className="mb-1 text-secondary">Shannon Nelson</p>
                <p className="mb-1 text-secondary">
                  4545 Seth Street Ballinger, TX 78965
                </p>
                <p className="mb-1 text-secondary">+1 444 556 8899</p>
              </div>
            </Col>

            <Col sm={4} md={4} lg={4}>
              <div className="mb-4 text-center">
                <Image
                  src="/images/qr-code.svg"
                  className="wh-150"
                  alt="qr-code"
                  width={150}
                  height={150}
                />
              </div>
            </Col>

            <Col sm={4} md={4} lg={4}>
              <div className="mb-4 text-sm-end">
                <p className="mb-4">
                  Date: <span className="text-secondary">01 Dec 2024</span>
                </p>
                <p className="mb-1">Pay To:</p>
                <p className="mb-1">Mercedes Foreman</p>
                <p className="mb-1">
                  458 Friendship Lane Walnut Creek, CA 5828
                </p>
                <p className="mb-1">+1 444 888 0055</p>
              </div>
            </Col>
          </Row>

          <div className="default-table-area all-products">
            <div className="table-responsive">
              <Table className="table align-middle">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Item Description</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td className="text-body">01</td>
                    <td className="text-secondary fw-medium">
                      High-performance laptop with the latest specifications
                    </td>
                    <td className="text-body">4</td>
                    <td className="text-body">$80</td>
                    <td className="text-body">$320</td>
                  </tr>

                  <tr>
                    <td className="text-body">02</td>
                    <td className="text-secondary fw-medium">
                      Complete set of ergonomic office furniture including a
                      desk and chair
                    </td>
                    <td className="text-body">3</td>
                    <td className="text-body">$45</td>
                    <td className="text-body">$135</td>
                  </tr>

                  <tr>
                    <td className="text-body">03</td>
                    <td className="text-secondary fw-medium">
                      Custom web development services including design, coding,
                      and testing
                    </td>
                    <td className="text-body">5</td>
                    <td className="text-body">$30</td>
                    <td className="text-body">$150</td>
                  </tr>

                  <tr>
                    <td className="text-body">04</td>
                    <td className="text-secondary fw-medium">
                      Expert consultation for developing and executing marketing
                      strategies
                    </td>
                    <td className="text-body">1</td>
                    <td className="text-body">$56</td>
                    <td className="text-body">$56</td>
                  </tr>

                  <tr>
                    <td className="text-body">05</td>
                    <td className="text-secondary fw-medium">
                      Design services for creating logos, graphics, and
                      promotional materials
                    </td>
                    <td className="text-body">4</td>
                    <td className="text-body">$90</td>
                    <td className="text-body">$360</td>
                  </tr>

                  <tr>
                    <td className="text-body">06</td>
                    <td className="text-secondary fw-medium">
                      Purchase of networking equipment, including routers and
                      switches
                    </td>
                    <td className="text-body">2</td>
                    <td className="text-body">$75</td>
                    <td className="text-body">$150</td>
                  </tr>

                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Sub total:</td>
                    <td className="text-body">$1,171</td>
                  </tr>

                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Tax (5%)</td>
                    <td className="text-body">$58.55</td>
                  </tr>

                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td className="fw-medium text-secondary">Grand Total</td>
                    <td className="text-secondary">$1,229.55</td>
                  </tr>
                </tbody>
              </Table>
            </div>
          </div>

          <div className="d-flex flex-wrap gap-3 justify-content-center mt-4">
            <button className="btn btn-danger py-2 px-4 fw-medium fs-16 text-white">
              Print
            </button>
            <button className="btn btn-primary py-2 px-4 fw-medium fs-16">
              {" "}
              <i className="ri-download-2-line text-white fw-medium"></i>{" "}
              Download
            </button>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default InvoiceDetails;
