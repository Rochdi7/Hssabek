"use client";

import { Card } from "react-bootstrap";

const ShippingDetails = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h3 className="mb-3">Shipping Details</h3>

          <div className="d-flex align-items-center mb-2">
            <span className="text-secondary">Shipping Date:</span>
            <span className="ms-1">25 Nov 2024 10:30 AM</span>
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
            <span className="ms-1">789 Pine St, Villageton, England</span>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default ShippingDetails;
