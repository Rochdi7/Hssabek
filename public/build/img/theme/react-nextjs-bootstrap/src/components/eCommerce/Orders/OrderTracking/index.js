"use client";

import { Card } from "react-bootstrap";

const OrderTracking = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between flex-wrap gap-2">
            <div>
              <h3 className="text-secondary mb-4">Order ID #2435679</h3>
              <span className="d-block mb-2">IBAN: EST6049283742809</span>
              <span className="d-block">Date: 26 Mar 2024</span>
            </div>
            <h3 className="text-secondary mb-0">Tracking ID: 000346798254</h3>
          </div>

          <div className="d-flex justify-content-between tracking-step style-two flex-wrap gap-3 my-lg-5 my-4">
            <div>
              <span className="text-secondary fw-semibold count text-center mb-3 bg-white">
                01
              </span>
              <span className="d-block text-secondary fw-semibold fs-16 mb-1">
                Order Placed
              </span>
              <span>22 Mar 2024 - 11:35AM</span>
            </div>
            <div>
              <span className="text-secondary fw-semibold count text-center mb-3 bg-white">
                02
              </span>
              <span className="d-block text-secondary fw-semibold fs-16 mb-1">
                Packed
              </span>
              <span>23 Mar 2024 - 10:35AM</span>
            </div>
            <div>
              <span className="text-secondary fw-semibold count text-center mb-3 bg-white">
                03
              </span>
              <span className="d-block text-secondary fw-semibold fs-16 mb-1">
                Shipped
              </span>
              <span>24 Mar 2024 - 3:45PM</span>
            </div>
            <div>
              <span className="text-white fw-semibold count text-center mb-3 active">
                04
              </span>
              <span className="d-block text-secondary fw-semibold fs-16 mb-1">
                Delivered
              </span>
              <span>25 Mar 2024 - 2:21PM</span>
            </div>
          </div>

          <span className="fw-semibold text-secondary mb-2 pb-1 d-block">
            View Details:
          </span>
          <span className="mb-2 pb-1 d-block">
            25 Mar 2024 - 2:21PM:{" "}
            <span className="text-secondary">Your order delivered.</span>
          </span>
          <span className="mb-2 pb-1 d-block">
            24 Mar 2024 - 3:45PM:{" "}
            <span className="text-secondary">Your order shipped.</span>
          </span>
          <span className="mb-2 pb-1 d-block">
            23 Mar 2024 - 10:35AM:{" "}
            <span className="text-secondary">
              Your order is on the way for deliver.
            </span>
          </span>
          <span className="d-block">
            22 Mar 2024 - 11:35AM:{" "}
            <span className="text-secondary">
              Your order is now on warehouse. It’s being ready for shipped.
            </span>
          </span>
        </Card.Body>
      </Card>
    </>
  );
};

export default OrderTracking;
