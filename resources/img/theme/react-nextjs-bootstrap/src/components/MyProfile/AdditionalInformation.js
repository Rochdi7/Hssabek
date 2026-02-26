"use client";

import { Card } from "react-bootstrap";

const AdditionalInformation = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h3 className="mb-3 mb-lg-4">Additional Information</h3>

          <ul className="ps-0 mb-0 list-unstyled">
            <li className="d-flex align-items-center mb-2 pb-1">
              <span>Phone:</span>
              <span className="text-secondary fw-medium ms-1">
                +1 444 266 5599
              </span>
            </li>

            <li className="d-flex align-items-center mb-2 pb-1">
              <span>Address:</span>
              <span className="text-secondary fw-medium ms-1">
                84 S. Arrowhead Court Branford
              </span>
            </li>

            <li className="d-flex align-items-center mb-2 pb-1">
              <span>Orders:</span>
              <span className="text-secondary fw-medium ms-1">696</span>
            </li>

            <li className="d-flex align-items-center mb-2 pb-1">
              <span>Products:</span>
              <span className="text-secondary fw-medium ms-1">9240</span>
            </li>

            <li className="d-flex align-items-center mb-2 pb-1">
              <span>Events:</span>
              <span className="text-secondary fw-medium ms-1">5</span>
            </li>
          </ul>
        </Card.Body>
      </Card>
    </>
  );
};

export default AdditionalInformation;
