"use client";

import { Card } from "react-bootstrap";

const ProfileInformation = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h3 className="mb-3 mb-lg-4">Profile Information</h3>

          <ul className="ps-0 mb-0 list-unstyled">
            <li className="d-flex align-items-center mb-2 pb-1">
              <span>User ID:</span>
              <span className="text-secondary fw-medium ms-1">7001</span>
            </li>

            <li className="d-flex align-items-center mb-2 pb-1">
              <span>Full Name:</span>
              <span className="text-secondary fw-medium ms-1">Olivia John</span>
            </li>

            <li className="d-flex align-items-center mb-2 pb-1">
              <span>Email:</span>
              <span className="text-secondary fw-medium ms-1">
                olivia@trezo.com
              </span>
            </li>

            <li className="d-flex align-items-center mb-2 pb-1">
              <span>Role:</span>
              <span className="text-secondary fw-medium ms-1">
                Administrator
              </span>
            </li>

            <li className="d-flex align-items-center mb-2 pb-1">
              <span>Location:</span>
              <span className="text-secondary fw-medium ms-1">
                New York, USA
              </span>
            </li>

            <li className="d-flex align-items-center">
              <span>Join Date:</span>
              <span className="text-secondary fw-medium ms-1">10 May 2022</span>
            </li>
          </ul>
        </Card.Body>
      </Card>
    </>
  );
};

export default ProfileInformation;
