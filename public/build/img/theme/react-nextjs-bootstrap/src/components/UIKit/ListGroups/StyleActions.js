"use client";

import { Card, ListGroup } from "react-bootstrap";

const StyleActions = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Style Actions</h4>
          
          <ListGroup>
            <ListGroup.Item>No style</ListGroup.Item>
            <ListGroup.Item variant="primary">Primary</ListGroup.Item>
            <ListGroup.Item action variant="secondary">
              Secondary
            </ListGroup.Item>
            <ListGroup.Item action variant="success">
              Success
            </ListGroup.Item>
            <ListGroup.Item action variant="danger">
              Danger
            </ListGroup.Item>
            <ListGroup.Item action variant="warning">
              Warning
            </ListGroup.Item>
            <ListGroup.Item action variant="info">
              Info
            </ListGroup.Item>
            <ListGroup.Item action variant="light">
              Light
            </ListGroup.Item>
            <ListGroup.Item action variant="dark">
              Dark
            </ListGroup.Item>
          </ListGroup>
        </Card.Body>
      </Card>
    </>
  )
}

export default StyleActions;