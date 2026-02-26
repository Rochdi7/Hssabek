"use client";

import { Card, Button, Badge } from "react-bootstrap";

const OtherBadges = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Other Badges</h4>

          <div>
            <Button variant="primary">
              Notifications{" "}
              <Badge pill bg="danger" className="text-white">
                9
              </Badge>
              <span className="visually-hidden">unread messages</span>
            </Button>

            <div className="mb-4"></div>

            <Button variant="primary" className="position-relative fw-medium">
              Inbox
              <span className="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger text-white">
                99+
                <span className="visually-hidden">unread messages</span>
              </span>
            </Button>

            <div className="mb-4"></div>

            <Button
              variant="primary"
              className="position-relative fw-medium text-white"
            >
              Profile
              <span className="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                <span className="visually-hidden">New alerts</span>
              </span>
            </Button>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default OtherBadges;
