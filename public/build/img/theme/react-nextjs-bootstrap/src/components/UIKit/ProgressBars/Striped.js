"use client";

import { Card, ProgressBar } from "react-bootstrap";

const Striped = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Striped</h4>
          
          <ProgressBar striped variant="success" now={40} />
          <br/>
          <ProgressBar striped variant="info" now={20} />
          <br/>
          <ProgressBar striped variant="warning" now={60} />
          <br/>
          <ProgressBar striped variant="danger" now={80} />
        </Card.Body>
      </Card>
    </>
  )
}

export default Striped;