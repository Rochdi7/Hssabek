"use client";

import { Card, Image } from "react-bootstrap";

const FluidExample = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Fluid Example</h4>

          <Image src="/images/profile-bg.jpg" alt="Fluid Image" fluid />
        </Card.Body>
      </Card>
    </>
  );
};

export default FluidExample;
