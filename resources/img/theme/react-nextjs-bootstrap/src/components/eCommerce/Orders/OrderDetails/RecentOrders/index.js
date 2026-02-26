"use client";

import { Card } from "react-bootstrap";
import Link from "next/link";
import Image from "next/image";
import ProductQuantity from './ProductQuantity';

const RecentOrders = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-lg-4 mb-3">
            <h3 className="mb-0">Recent Orders</h3>
            <h3 className="mb-0">Customer ID : 357951</h3>
          </div>

          <div className="default-table-area all-carts">
            <div className="table-responsive">
              <table className="table align-middle">
                <thead>
                  <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td className="text-secondary">#JAN-2345</td>
                    <td>
                      <Link
                        href="/ecommerce/product-details"
                        className="d-flex align-items-center"
                      >
                        <Image
                          src="/images/product-1.jpg"
                          className="wh-40 rounded-3"
                          alt="product-1"
                          width={40}
                          height={40}
                        />
                        <div className="ms-2 ps-1">
                          <h6 className="fw-medium fs-14 mb-0">Smart Band</h6>
                        </div>
                      </Link>
                    </td>
                    <td>
                      <ProductQuantity />
                    </td>
                    <td className="text-body">$80.00</td>
                    <td className="text-body">$80.00</td>
                  </tr>

                  <tr>
                    <td className="text-secondary">#JAN-1323</td>
                    <td>
                      <Link
                        href="/ecommerce/product-details"
                        className="d-flex align-items-center"
                      >
                        <Image
                          src="/images/product-2.jpg"
                          className="wh-40 rounded-3"
                          alt="product-1"
                          width={40}
                          height={40}
                        />
                        <div className="ms-2 ps-1">
                          <h6 className="fw-medium fs-14 mb-0">Headphone</h6>
                        </div>
                      </Link>
                    </td>
                    <td>
                      <ProductQuantity />
                    </td>
                    <td className="text-body">$150.00</td>
                    <td className="text-body">$450.00</td>
                  </tr>

                  <tr>
                    <td className="text-secondary">#DEC-1234</td>
                    <td>
                      <Link
                        href="/ecommerce/product-details"
                        className="d-flex align-items-center"
                      >
                        <Image
                          src="/images/product-3.jpg"
                          className="wh-40 rounded-3"
                          alt="product-1"
                          width={40}
                          height={40}
                        />
                        <div className="ms-2 ps-1">
                          <h6 className="fw-medium fs-14 mb-0">
                            iPhone 15 Plus
                          </h6>
                        </div>
                      </Link>
                    </td>
                    <td>
                      <ProductQuantity />
                    </td>
                    <td className="text-body">$750.00</td>
                    <td className="text-body">$750.00</td>
                  </tr>

                  <tr>
                    <td className="text-secondary">#DEC-3567</td>
                    <td>
                      <Link
                        href="/ecommerce/product-details"
                        className="d-flex align-items-center"
                      >
                        <Image
                          src="/images/product-4.jpg"
                          className="wh-40 rounded-3"
                          alt="product-1"
                          width={40}
                          height={40}
                        />
                        <div className="ms-2 ps-1">
                          <h6 className="fw-medium fs-14 mb-0">
                            Bluetooth Speaker
                          </h6>
                        </div>
                      </Link>
                    </td>
                    <td>
                      <ProductQuantity />
                    </td>
                    <td className="text-body">$15.00</td>
                    <td className="text-body">$75.00</td>
                  </tr>
                  
                  <tr>
                    <td className="text-secondary">#DEC-1098</td>
                    <td>
                      <Link
                        href="/ecommerce/product-details"
                        className="d-flex align-items-center"
                      >
                        <Image
                          src="/images/product-5.jpg"
                          className="wh-40 rounded-3"
                          alt="product-1"
                          width={40}
                          height={40}
                        />
                        <div className="ms-2 ps-1">
                          <h6 className="fw-medium fs-14 mb-0">
                            Airbuds 2nd Gen
                          </h6>
                        </div>
                      </Link>
                    </td>
                    <td>
                      <ProductQuantity />
                    </td>
                    <td className="text-body">$25.00</td>
                    <td className="text-body">$50.00</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default RecentOrders;
