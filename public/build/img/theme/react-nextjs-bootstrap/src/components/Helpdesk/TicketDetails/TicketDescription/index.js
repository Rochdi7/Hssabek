"use client";

import { Card } from "react-bootstrap";
import Image from "next/image";
import CommentForm from "./CommentForm"; 

const TicketDescription = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-15 mb-2 pb-1">Ticket Description</h4>
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting
            industry. Lorem Ipsum has been the industry standard dummy text ever
            since the 1500s, when an unknown printer took a galley of type and
            scrambled it to make a type specimen book. It has survived not only
            five centuries, but also the leap into electronic typesetting,
            remaining essentially unchanged. It was popularised in the 1960s
            with the release of Letraset sheets containing Lorem Ipsum passages,
            and more recently with desktop publishing software like Aldus
            PageMaker including versions of{" "}
          </p>

          <h4 className="fs-15 mb-2 pb-1 mt-4">
            Network Infrastructure for Trezo
          </h4>

          <ul className="mb-0">
            <li className="mb-2">Login Issues</li>
            <li className="mb-2">Cloud Migration</li>
            <li className="mb-2">Website Revamp</li>
            <li className="mb-2">Mobile Application</li>
            <li className="mb-2">System Deployment</li>
          </ul>

          <h4 className="fs-15 mb-2 pb-1 mt-4">Here is the Code:</h4>
          
          <pre className="line-numbers pt-0 pb-0 ps-25 pe-25 mb-0">
            <code
              className="language-markup"
              id="basicAlertsCode"
              style={{
                backgroundColor: '#f5f2f0',
                display: 'block',     
                padding: '15px',      
                borderRadius: '5px',   
                overflowX: 'auto',
              }}
            >
              &lt;span className=&quot;material-symbols-outlined&quot;&gt;search&lt;/span&gt;
            </code>
          </pre>

        </Card.Body>
      </Card>

      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="border-bottom border-primary pb-4 mb-4">
            <div className="d-flex flex-wrap gap-3 align-items-center mb-3">
              <Image
                src="/images/user-6.jpg"
                className="wh-34 rounded-circle"
                alt="user"
                width={34}
                height={34}
              />
              <span className="fw-medium text-primary">Ponsiano</span>
              <span>a day ago</span>
              <span className="bg-primary text-white fw-medium px-2 rounded-1 fs-12 position-relative top-2">
                #BD0JL0G6
              </span>
            </div>
            <p>
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry. Lorem Ipsum has been the industry standard dummy text
              ever since the 1500s, when an unknown printer took a galley of
              type and scrambled it to make a type specimen book. It has
              survived not only five centuries, but also the leap into
              electronic typesetting, remaining essentially unchanged.
            </p>

            <h4 className="fs-15 mb-2 pb-1">Screenshots</h4>
            <Image
              src="/images/screenshorts.jpg"
              className="mw-80 rounded-3"
              alt="screenshorts"
              width={80}
              height={80}
            />
          </div>

          <div className="border-bottom pb-4 mb-4 ps-4">
            <div className="d-flex flex-wrap gap-3 align-items-center mb-3">
              <Image
                src="/images/user-7.jpg"
                className="wh-34 rounded-circle"
                alt="user"
                width={34}
                height={34}
              />
              <span className="fw-medium text-danger">Zelxa</span>
              <span>18 hours ago</span>
              <span
                className="text-white fw-medium px-2 rounded-1 fs-12 position-relative top-2"
                style={{ backgroundColor: '#3584fc' }}
              >
                Support Staff
              </span>
            </div>

            <p>
              It was popularised in the 1960s with the release of Letraset
              sheets containing Lorem Ipsum passages, and more recently with
              desktop publishing software like Aldus PageMaker including
              versions of Lorem Ipsum.
            </p>

            <h4 className="fs-15 mb-2 pb-1">Screenshots</h4>
            <div className="d-flex flex-wrap gap-3">
              <Image
                src="/images/screenshorts-2.jpg"
                className="mw-80 rounded-3"
                alt="screenshorts"
                width={80}
                height={80}
              />
              <Image
                src="/images/screenshorts-3.jpg"
                className="mw-80 rounded-3"
                alt="screenshorts"
                width={80}
                height={80}
              />
            </div>
          </div>

          <div className="border-bottom pb-4 mb-4 ps-4">
            <div className="d-flex flex-wrap gap-3 align-items-center mb-3">
              <Image
                src="/images/user-6.jpg"
                className="wh-34 rounded-circle"
                alt="user"
                width={34}
                height={34}
              />
              <span className="fw-medium text-primary">Ponsiano</span>
              <span>12 hours ago</span>
            </div>
            <p>
              It has survived not only five centuries, but also the leap into
              electronic typesetting, remaining essentially unchanged.
            </p>
          </div>

          <div className="border-bottom pb-4 mb-4 ps-4">
            <div className="d-flex flex-wrap gap-3 align-items-center mb-3">
              <Image
                src="/images/user-7.jpg"
                className="wh-34 rounded-circle"
                alt="user"
                width={34}
                height={34}
              />
              <span className="fw-medium text-danger">Zelxa</span>
              <span>05 hours ago</span>
              <span
                className="text-white fw-medium px-2 rounded-1 fs-12 position-relative top-2"
                style={{ backgroundColor: '#3584fc' }}
              >
                Support Staff
              </span>
            </div>
            <p>
              The standard chunk of Lorem Ipsum used since the 1500s is
              reproduced below for those interested. Sections 1.10.32 and
              1.10.33 from de Finibus Bonorum et Malorum by Cicero are also
              reproduced in their exact original form, accompanied by English
              versions from the 1914 translation.
            </p>
          </div>

          {/* CommentForm */}
          <CommentForm />
        </Card.Body>
      </Card>
    </>
  );
};

export default TicketDescription;
