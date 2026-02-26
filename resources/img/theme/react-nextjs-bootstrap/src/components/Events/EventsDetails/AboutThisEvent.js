"use client";

import { Card } from "react-bootstrap";

const AboutThisEvent = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h3 className="mb-3 mb-lg-4">About This Event</h3>

          <p>
            Pellentesque viverra lorem malesuada nunc tristique sapien.
            Imperdiet sit hendrerit tincidunt bibendum donec adipiscing. Tellus
            non morbi nascetur cursus etiam facilisis mi. Dolor aliquam sed amet
            aliquam venenatis. Ac viverra interdum tortor enim. Molestie
            tincidunt ut consequat a urna tortor. Vitae velit ac nisl velit
            mauris.
          </p>

          <p>
            Imperdiet sit hendrerit tincidunt bibendum donec adipiscing. Tellus
            non morbi nascetur cursus etiam facilisis mi. Dolor aliquam sed amet
            aliquam venenatis. Ac viverra interdum tortor enim. Molestie
            tincidunt ut.
          </p>

          <ul className="text-primary mb-0 pt-2">
            <li className="mb-2 pb-1">
              <span className="text-body">
                Pellentesque viverra lorem malesuada nunc tristique sapien.
              </span>
            </li>
            <li className="mb-2 pb-1">
              <span className="text-body">
                Imperdiet sit hendrerit tincidunt bibendum donec adipiscing.
              </span>
            </li>
            <li className="mb-2 pb-1">
              <span className="text-body">
                Tellus non morbi nascetur cursus etiam facilisis mi.
              </span>
            </li>
            <li className="mb-0">
              <span className="text-body">
                Imperdiet sit hendrerit tincidunt bibendum donec adipiscing.
              </span>
            </li>
          </ul>
        </Card.Body>
      </Card>
    </>
  );
};

export default AboutThisEvent;
