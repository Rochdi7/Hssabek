"use client";

import React from "react";
import { Card } from "react-bootstrap";

const BillingDetails = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h3 className="mb-3">Billing Details</h3>

          <div className="d-flex align-items-center mb-2">
            <span className="text-secondary">Name:</span>
            <span className="ms-1">Gary Fraser</span>
          </div>

          <div className="d-flex align-items-center mb-2">
            <span className="text-secondary">Email:</span>
            <span className="ms-1">example@trezo.com</span>
          </div>

          <div className="d-flex align-items-center mb-2">
            <span className="text-secondary">Phone:</span>
            <span className="ms-1">+1 444 333 5566</span>
          </div>

          <div className="d-flex mb-0">
            <span className="text-secondary">Address:</span>
            <span className="ms-1">715 Maple St, Hamletville, England</span>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default BillingDetails;
