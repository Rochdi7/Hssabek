"use client";

import { Card } from "react-bootstrap";

const TotalOrders = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <span>Total Orders</span>

          <h3 className="mb-0 fs-20">75k+</h3>

          <div className="py-3">
            <div className="wh-77 lh-97 text-center m-auto bg-primary-div bg-opacity-25 rounded-circle">
              <span className="material-symbols-outlined fs-32 text-primary-div">
                orders
              </span>
            </div>
          </div>

          <div className="d-flex justify-content-between align-items-center">
            <span className="fs-12">This Month</span>

            <span className="material-symbols-outlined fs-24 text-danger">
              trending_down
            </span>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default TotalOrders;
