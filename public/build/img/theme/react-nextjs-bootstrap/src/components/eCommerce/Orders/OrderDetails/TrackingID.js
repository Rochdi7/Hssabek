"use client";

import { Card } from "react-bootstrap";

const TrackingID = () => {
  return (
    <>
      <Card className="bg-primary border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h3 className="text-white mb-lg-4 mb-3">Tracking ID: 000346798254</h3>

          <div className="d-flex justify-content-between tracking-step flex-wrap gap-3">
            <div>
              <span className="text-white fw-semibold count text-center mb-3">
                01
              </span>
              <span className="d-block text-white fw-semibold">
                Order Placed
              </span>
            </div>

            <div className="text-center">
              <span className="text-white fw-semibold count mb-3">02</span>
              <span className="d-block text-white fw-semibold">Packed</span>
            </div>

            <div className="text-center">
              <span className="text-white fw-semibold count mb-3 active">
                03
              </span>
              <span className="d-block text-white fw-semibold">Shipped</span>
            </div>

            <div className="text-end">
              <span className="text-white fw-semibold count text-center mb-3">
                04
              </span>
              <span className="d-block text-white fw-semibold">Delivered</span>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default TrackingID;
