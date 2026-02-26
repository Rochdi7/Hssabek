"use client";

import { Card } from "react-bootstrap";

const TotalIncome = () => {
  return (
    <>
      <Card className="border-0 rounded-3 bg-white mb-4">
        <Card.Body className="p-4">
          <div className="d-flex mb-4">
            <div className="flex-grow-1">
              <span className="d-block mb-1">Total Income</span>
              <h4 className="fs-20 mb-0">$531,200</h4>
            </div>
            <div className="flex-shrink-0 ms-3">
              <i
                className="ri-money-dollar-circle-line fs-24 text-success for dark-bg d-inline-block text-center rounded-circle"
                style={{
                  width: "60px",
                  height: "60px",
                  lineHeight: "60px",
                  backgroundColor: "#ECF0FF",
                }}
              ></i>
            </div>
          </div>
          <div className="d-flex align-items-center">
            <span className="d-inline-block px-3 bg-success bg-opacity-10 text-success border border-success rounded-pill fs-12 fw-medium">
              +35.5%
            </span>
            <span className="ms-2 fs-12">Last 30 days</span>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default TotalIncome;
