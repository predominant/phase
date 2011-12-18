<?php

App::uses('AppShell', 'Console/Command');

/**
 * PhaseShell
 */
class PhaseShell extends AppShell {

    public $tasks = array(
        'Write',
        'Build',
        'Deploy'
    );

    /**
     * getOptionParser
     */
    public function getOptionParser() {
        $parser = new ConsoleOptionParser($this->name);
        $parser->description(array(
            __d('phase', 'Build and deploy interface')
		))->addSubcommand('write', array(
				'help' => __d('phase', 'Create a new post.')
		))->addSubcommand('build', array(
				'help' => __d('phase', 'Generate a static version of your applicaction.')
		))->addSubcommand('upload', array(
				'help' => __d('phase', 'Copy files to public server.')
		));

        return $parser;
    }

    public function go() {
        $this->Build->execute();
        $this->Deploy->execute();
    }
}
