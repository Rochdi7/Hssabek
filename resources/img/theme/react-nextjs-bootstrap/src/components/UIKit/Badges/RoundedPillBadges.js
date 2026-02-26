"use client";

import { Card, Badge, Stack } from "react-bootstrap";

const RoundedPillBadges = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Rounded Pill Badges</h4>

          <Stack direction="horizontal" gap={2}>
            <Badge pill bg="primary" className="text-white py-1 px-2">
              Primary
            </Badge>

            <Badge pill bg="secondary" className="text-white py-1 px-2">
              Secondary
            </Badge>

            <Badge pill bg="success" className="text-white py-1 px-2">
              Success
            </Badge>

            <Badge pill bg="danger" className="text-white py-1 px-2">
              Danger
            </Badge>

            <Badge pill bg="warning" text="dark" className="py-1 px-2">
              Warning
            </Badge>

            <Badge pill bg="info" className="text-white py-1 px-2">
              Info
            </Badge>

            <Badge pill bg="light" text="dark" className="py-1 px-2">
              Light
            </Badge>

            <Badge pill bg="dark" className="text-white py-1 px-2">
              Dark
            </Badge>
          </Stack>
        </Card.Body>
      </Card>
    </>
  );
};

export default RoundedPillBadges;
