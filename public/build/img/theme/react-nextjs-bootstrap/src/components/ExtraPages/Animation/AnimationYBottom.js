"use client";

import { Card } from "react-bootstrap";
import Image from "next/image";

const AnimationYBottom = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-4">
            <h3 className="mb-0">Animation Y Bottom</h3>
          </div>

          <div>
            <Image
              src="/images/user-1.jpg"
              className="wh-38 rounded-circle border border-2 border-white transition-y-bottom"
              alt="user"
              width={48}
              height={38}
            />
            <Image
              src="/images/user-2.jpg"
              className="wh-38 rounded-circle border border-2 border-white transition-y-bottom ms-8"
              alt="user"
              width={48}
              height={38}
            />
            <Image
              src="/images/user-3.jpg"
              className="wh-38 rounded-circle border border-2 border-white transition-y-bottom ms-8"
              alt="user"
              width={48}
              height={38}
            />
            <Image
              src="/images/user-4.jpg"
              className="wh-38 rounded-circle border border-2 border-white transition-y-bottom ms-8"
              alt="user"
              width={48}
              height={38}
            />
            <Image
              src="/images/user-5.jpg"
              className="wh-38 rounded-circle border border-2 border-white transition-y-bottom ms-8"
              alt="user"
              width={48}
              height={38}
            />
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default AnimationYBottom;
