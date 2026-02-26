"use client";

import { Card } from "react-bootstrap";

const BlankPage = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-4">
            <h3 className="mb-0">Content goes here!</h3>
          </div>

          <p>Hello World!</p>
        </Card.Body>
      </Card>
    </>
  );
};

export default BlankPage;
