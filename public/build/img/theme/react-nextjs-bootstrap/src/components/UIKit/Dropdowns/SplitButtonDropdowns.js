"use client";

import { Dropdown, Card, Button, ButtonGroup } from "react-bootstrap";

const SplitButtonDropdowns = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Split Button Dropdowns</h4>
            
          <Dropdown as={ButtonGroup}>
            <Button variant="primary">Split Button</Button>

            <Dropdown.Toggle split variant="primary" id="dropdown-split-basic" />

            <Dropdown.Menu>
              <Dropdown.Item href="#/action-1">Action</Dropdown.Item>
              <Dropdown.Item href="#/action-2">Another action</Dropdown.Item>
              <Dropdown.Item href="#/action-3">Something else</Dropdown.Item>
            </Dropdown.Menu>
          </Dropdown>
        </Card.Body>
      </Card>
    </>
  )
}

export default SplitButtonDropdowns;