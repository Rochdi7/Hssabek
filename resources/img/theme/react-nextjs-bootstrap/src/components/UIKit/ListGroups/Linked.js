"use client";

import { Card, ListGroup } from "react-bootstrap";

const Linked = () => {
  const alertClicked = () => {
    alert('You clicked the third ListGroupItem');
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Linked</h4>
          
          <ListGroup defaultActiveKey="#link1">
            <ListGroup.Item action href="#link1">
              Link 1
            </ListGroup.Item>
            <ListGroup.Item action href="#link2" disabled>
              Link 2
            </ListGroup.Item>
            <ListGroup.Item action onClick={alertClicked}>
              This one is a button
            </ListGroup.Item>
          </ListGroup>
        </Card.Body>
      </Card>
    </>
  )
}

export default Linked;