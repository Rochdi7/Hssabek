"use client";

import { Card, Badge } from "react-bootstrap";

const HeadingsBadges = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Headings Badges</h4>

          <div>
            <h1>
              Example heading <Badge bg="primary" className="text-white">New</Badge>
            </h1>
            <h2>
              Example heading <Badge bg="secondary" className="text-white">New</Badge>
            </h2>
            <h3>
              Example heading <Badge bg="success" className="text-white">New</Badge>
            </h3>
            <h4>
              Example heading <Badge bg="warning" className="text-white">New</Badge>
            </h4>
            <h5>
              Example heading <Badge bg="danger" className="text-white">New</Badge>
            </h5>
            <h6>
              Example heading <Badge bg="info" className="text-white">New</Badge>
            </h6>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default HeadingsBadges;
