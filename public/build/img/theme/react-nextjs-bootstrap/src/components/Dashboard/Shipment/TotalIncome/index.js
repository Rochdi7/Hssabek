"use client";

import { Card } from "react-bootstrap";

const TotalIncome = () => {
  return (
    <>
      <Card
        className="border-0 rounded-3 mb-4"
        style={{
          background: "linear-gradient(108deg, #3A4252 0%, #23272E 100%)",
        }}
      >
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center mb-4">
            <span className="d-inline-block px-3 bg-success bg-opacity-25 text-success border border-success rounded-pill fs-12 fw-medium">
              +35.5%
            </span>
            <div className="text-end">
              <span className="ms-2 fs-12" style={{ color: "#B1BBC8" }}>
                Last 30 days
              </span>
              <span className="fs-12 fw-bold text-success d-block">
                $13,250
              </span>
            </div>
          </div>

          <div className="d-flex align-items-end">
            <div className="flex-grow-1">
              <span className="d-block mb-1" style={{ color: "#B1BBC8" }}>
                Total Income
              </span>
              <h4 className="fs-20 mb-0 text-white">$531,200</h4>
            </div>
            <div className="flex-shrink-0 me-3 me-auto">
              <i
                className="ri-money-dollar-circle-line fs-24 text-success bg-success d-inline-block text-center rounded-circle text-white"
                style={{ width: "60px", height: "60px", lineHeight: "60px" }}
              ></i>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default TotalIncome;
