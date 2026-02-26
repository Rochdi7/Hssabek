"use client";

import { Card } from "react-bootstrap";

const AccountsReceivable = () => {
  return (
    <>
      <Card className="border-0 rounded-3 bg-white mb-4">
        <Card.Body className="p-4">
          <div className="d-flex mb-4">
            <div className="flex-grow-1">
              <span className="d-block mb-1">Accounts Receivable</span>
              <h4 className="fs-20 mb-0">$15,990</h4>
            </div>
            <div className="flex-shrink-0 ms-3">
              <i
                className="ri-shopping-bag-2-line fs-24 text-primary for dark-bg d-inline-block text-center rounded-circle"
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
            <span className="d-inline-block px-3 bg-danger bg-opacity-10 text-danger border border-danger rounded-pill fs-12 fw-medium">
              -5.8%
            </span>
            <span className="ms-2 fs-12">Last 30 days</span>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default AccountsReceivable;
