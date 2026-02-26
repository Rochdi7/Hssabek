"use client";

import React from "react";
import { Card } from "react-bootstrap";

const DeliveryDetails = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h3 className="mb-3">Delivery Details</h3>

          <div className="d-flex align-items-center mb-2">
            <span className="text-secondary">XYZ Delivery</span>
          </div>
          
          <div className="d-flex align-items-center mb-2">
            <span className="text-secondary">Order ID:</span>
            <span className="ms-1">XXXXXX1004</span>
          </div>

          <div className="d-flex align-items-center mb-2">
            <span className="text-secondary">Payment Method:</span>
            <span className="ms-1">Master Card</span>
          </div>

          <div className="d-flex align-items-center mb-0">
            <span className="text-secondary">Email:</span>
            <span className="ms-1">example@trezo.com</span>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default DeliveryDetails;
