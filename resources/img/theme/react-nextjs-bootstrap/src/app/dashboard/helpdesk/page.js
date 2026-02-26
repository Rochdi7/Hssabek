import { Row, Col } from "react-bootstrap";
import Congratulations from "@/components/Dashboard/Helpdesk/Congratulations";
import TicketsResolved from "@/components/Dashboard/Helpdesk/TicketsResolved";
import TicketsInProgress from "@/components/Dashboard/Helpdesk/TicketsInProgress";
import TicketsDue from "@/components/Dashboard/Helpdesk/TicketsDue";
import TicketsNewOpen from "@/components/Dashboard/Helpdesk/TicketsNewOpen";
import TicketsStatus from "@/components/Dashboard/Helpdesk/TicketsStatus";
import CustomerSatisfaction from "@/components/Dashboard/Helpdesk/CustomerSatisfaction";
import ResponseTime from "@/components/Dashboard/Helpdesk/ResponseTime";
import PerformanceOfAgents from "@/components/Dashboard/Helpdesk/PerformanceOfAgents";
import NewTicketsSolvedTickets from "@/components/Dashboard/Helpdesk/NewTicketsSolvedTickets";
import RecentCustomerRatings from "@/components/Dashboard/Helpdesk/RecentCustomerRatings";
import ToDoList from "@/components/Dashboard/Helpdesk/ToDoList";
import SupportOverview from "@/components/Dashboard/Helpdesk/SupportOverview";

export default function Page() {
  return (
    <>
      <Row className="justify-content-center">
        <Col xs={12} sm={12} md={12} lg={4} xl={4} xxl={4}>
          <Congratulations />

          <Row>
            <Col xs={12} sm={6} md={6} lg={12} xl={12} xxl={6}>
              <TicketsResolved />
            </Col>

            <Col xs={12} sm={6} md={6} lg={12} xl={12} xxl={6}>
              <TicketsInProgress />
            </Col>

            <Col xs={12} sm={6} md={6} lg={12} xl={12} xxl={6}>
              <TicketsDue />
            </Col>

            <Col xs={12} sm={6} md={6} lg={12} xl={12} xxl={6}>
              <TicketsNewOpen />
            </Col>
          </Row>
        </Col>

        <Col xs={12} sm={12} md={12} lg={8} xl={8} xxl={8}>
          <TicketsStatus />

          <Row>
            <Col xs={12} sm={6} lg={12} xl={12} xxl={6}>
              <CustomerSatisfaction />
            </Col>

            <Col xs={12} sm={6} lg={12} xl={12} xxl={6}>
              <ResponseTime />
            </Col>
          </Row>
        </Col>
      </Row>

      <PerformanceOfAgents />

      <Row className="justify-content-center">
        <Col xs={12} lg={6} xl={6} xxl={7}>
          <NewTicketsSolvedTickets />
        </Col>

        <Col xs={12} lg={6} xl={6} xxl={5}>
          <RecentCustomerRatings />
        </Col>
      </Row>

      <Row className="justify-content-center">
        <Col xs={12} md={12} lg={12} xl={8} xxl={8}>
          <ToDoList />
        </Col>

        <Col xs={12} md={12} lg={12} xl={4} xxl={4}>
          <SupportOverview />
        </Col>
      </Row>
    </>
  );
}
