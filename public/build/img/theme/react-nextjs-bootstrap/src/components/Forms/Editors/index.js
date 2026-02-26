"use client";

import { Card, Form } from "react-bootstrap";

const Editors = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Editors</h4>
          
          <Form.Control as="textarea" rows={6} placeholder="Type here..." /> 
        </Card.Body>
      </Card>
    </>
  )
}

export default Editors;