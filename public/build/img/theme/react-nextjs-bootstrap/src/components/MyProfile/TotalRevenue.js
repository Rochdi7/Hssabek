"use client";

import { Card } from "react-bootstrap";

const TotalRevenue = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <span>Total Revenue</span>

          <h3 className="mb-0 fs-20">$34.5m+</h3>

          <div className="py-3">
            <div className="wh-77 lh-97 text-center m-auto bg-danger bg-opacity-25 rounded-circle">
              <span className="material-symbols-outlined fs-32 text-danger">
                payments
              </span>
            </div>
          </div>

          <div className="d-flex justify-content-between align-items-center">
            <span className="fs-12">This Month</span>

            <span className="material-symbols-outlined fs-24 text-success">
              trending_up
            </span>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default TotalRevenue;
