"use client";

import { Card } from "react-bootstrap";

const TotalOrder = () => {
  return (
    <>
      <Card className="border-0 rounded-3 bg-white mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center mb-4">
            <span className="d-inline-block px-3 bg-danger bg-opacity-10 text-danger border border-danger rounded-pill fs-12 fw-medium">
              -2.5%
            </span>
            <div className="text-end">
              <span className="ms-2 fs-12">Last 30 days</span>
              <span className="fs-12 fw-bold text-danger d-block">-140</span>
            </div>
          </div>

          <div className="d-flex align-items-end">
            <div className="flex-grow-1">
              <span className="d-block mb-1">Total Order</span>
              <h4 className="fs-20 mb-0">49,120</h4>
            </div>
            <div className="flex-shrink-0 me-3 me-auto">
              <i
                className="ri-box-3-line fs-24 text-white bg-danger d-inline-block text-center rounded-circle text-white"
                style={{ width: "60px", height: "60px", lineHeight: "60px" }}
              ></i>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default TotalOrder;
